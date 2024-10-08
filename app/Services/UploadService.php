<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    /**
     * Store the uploaded files.
     *
     * @param mixed $files
     * @param string $path
     * @param string $extension
     * @return string|array|null
     * @throws Exception
     */
    public static function store(mixed $files = null, string $path = 'files', string $extension = 'png'): array|string|null
    {
        $items = is_array($files) ? $files : [$files];
        $uploadedPaths = [];

        try {
            foreach (array_filter($items) as $value) {
                if (is_string($value) && ($data = explode(',', $value)) && is_base64($value)) {

                    $base64Content = $data[1] ?? $data[0];
                    $decodedContent = base64_decode($base64Content);
                    $file = $path . '/' . (isset($data[1]) ? self::generateUniqueFileName($value) : (time() . ".$extension"));

                    $filePath = Storage::put($file, $decodedContent) ? $file : null;

                } else {
                    $filePath = is_file($value) ? Storage::putFile($path, $value) : $value;
                }

                $uploadedPaths[] = $filePath;
            }
        } catch (\Exception|\Error $e) {
            logError($e);
            throw $e;
        }

        $paths = array_filter($uploadedPaths);

        return count($paths) > 1 ? $paths : ($paths[0] ?? null);
    }

    /**
     * Update an object after archive upload.
     *
     * @param mixed $object
     * @param string $attribute
     * @param mixed $value
     * @return mixed
     */
    public static function update(mixed $object, string $attribute, mixed $value): bool
    {
        try {
            $object->setRawAttributes([$attribute => $value]);
            $object->saveQuietly();

            return true;
        } catch (\Exception|\Error $e) {
            return false;
        }
    }

    /**
     * Delete files from storage.
     *
     * @param mixed $files
     * @return bool
     */
    public static function delete(mixed $files = null): bool
    {
        $items = is_array($files) ? $files : [$files];

        foreach ($items as $item) {
            if (!empty($item) && Storage::exists($item)) {
                Storage::delete($item);
            }
        }

        return true;
    }

    /**
     * Get the URL of the file.
     *
     * @param string|null $path
     * @return string|null
     * @throws Exception
     */
    public static function url(?string $path = null): ?string
    {
        //Check if the file is related to local storage
        if (empty($path)) {
            return null;
        }

        if (Storage::exists($path)) {
            return Storage::url($path);
//            return self::convertToBase64($path);
        }

        // if (!config('services.archive_upload.enable')) {
        //     return null;
        // }

        // //If not related to local storage, attempt to connect with external URL using DMSUploader
        // try {
        //     $response = DMSUploader::fetchUrl($path);
        //     return self::resolveDataType($response['extension'], $response['base64']);
        // } catch (\Error|Exception $e) {
        //     logError($e);
        // }

        return Storage::url($path);
    }

    /**
     * Generate a unique file name.
     *
     * @param string $originalFileName
     * @return string
     */
    public static function generateUniqueFileName(string $originalFileName): string
    {
        $extensionMap = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/octet-stream' => 'docx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'text/plain' => 'txt',
            'image/png' => 'png',
            'image/jpeg' => 'jpg',
            'image/jpg' => 'jpg',
            'image/webp' => 'webp',
            'application/pdf' => 'pdf',
            'message/rfc822' => 'eml',
            'application/vnd.msoutlook' => 'msg',
            'application/vnd.ms-outlook' => 'msg',

        ];

        $mimeType = mime_content_type($originalFileName);
        $extension = $extensionMap[$mimeType] ?? pathinfo($originalFileName, PATHINFO_EXTENSION);

        return time() . '_' . Str::random(8) . '.' . $extension;
    }

    /**
     * @param string $path
     * @return string
     */
    public static function convertToBase64(string $path): string
    {
        $fileContent = Storage::get($path);
        $fileExtension = pathinfo($path)['extension'] ?? null;
        $base64Encoded = base64_encode($fileContent);

        return self::resolveDataType($fileExtension, $base64Encoded);
    }

    /**
     * @param string $extension
     * @param string $base64Encoded
     * @return string
     */
    public static function resolveDataType(string $extension, string $base64Encoded): string
    {
        return match (strtolower($extension)) {
            'png' => "data:image/png;base64," . $base64Encoded,
            'jpg' => "data:image/jpeg;base64," . $base64Encoded,
            'jpeg' => "data:image/jpeg;base64," . $base64Encoded,
            'webp' => "data:image/webp;base64," . $base64Encoded,
            'pdf' => "data:application/pdf;base64," . $base64Encoded,
            'docx' => "data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64," . $base64Encoded,
            'doc' => "data:application/msword;base64," . $base64Encoded,
            'txt' => "data:text/plain;base64," . $base64Encoded,
            'eml' => "data:message/rfc822;base64," . $base64Encoded,
            'msg' => "data:application/vnd.ms-outlook;base64," . $base64Encoded,
            default => "data:application/octet-stream;base64," . $base64Encoded,
        };
    }

}
