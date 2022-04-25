<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

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
            if (file_exists($targetDirectory . '/' . $fileName)) {
                try {
                    unlink($targetDirectory . '/' . $fileName);
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }
        }
    }
}
