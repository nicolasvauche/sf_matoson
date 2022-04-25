<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    public function upload(UploadedFile $file, $targetDirectory, $slug)
    {
        $fileName = strtolower($slug) . '.' . $file->guessExtension();

        try {
            $file->move($targetDirectory, $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function delete($targetDirectory, $fileName)
    {
        if (!empty($fileName)) {
            $filesystem = new Filesystem();

            if ($filesystem->exists($targetDirectory . '/' . $fileName)) {
                try {
                    $filesystem->remove($targetDirectory . '/' . $fileName);
                } catch (FileException $e) {
                    var_dump($filesystem->exists($targetDirectory . '/' . $fileName));exit;
                }
            }
        }
    }
}
