<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 9/16/20, 11:05 AM
 * Last Modified: 9/16/20, 11:05 AM
 * Project Name: Wafaq
 * File Name: VideoUploadManager.php
 */
declare(strict_types=1);


namespace App\Services\Upload;


use App\Models\Lesson;
use Flow\Config as FlowConfig;
use Flow\Request as FlowRequest;
use Illuminate\Support\Facades\File;

class VideoUploadManager
{
    public function uploadLessonVideo($id)
    {
        $config = new FlowConfig();

        if (!File::exists(public_path('/uploads/tmp'))) {
            File::makeDirectory(public_path('/uploads/tmp'), 0777);
        }

        $config->setTempDir(public_path('/uploads/tmp'));
        $config->setDeleteChunksOnSave(false);
        $file = new \Flow\File($config);

        $request = new FlowRequest();

        $totalSize = $request->getTotalSize();

        if ($totalSize && $totalSize > (1024 * 1024 * 200)) {
            return \Response::json(['error' => 'The file size is too large. Uploadable size is up to ' . ini_get('upload_max_filesize') . '. '], 400);
        }

        $uploadFile = $request->getFile();

        if ($file->validateChunk()) {
            $file->saveChunk();
        } else {
            // Indicate that we are not done with all the chunks.
            return \Response::json(['error' => 'Upload failed. '], 204);
        }
        $filedir = '/uploads/lessons/';

        if (!file_exists(public_path() . $filedir)) {
            mkdir(public_path() . $filedir, $mode = 0777, true);
        }
        $thumbnail_dir = '/uploads/thumbnail/';
        if (!file_exists(public_path() . $thumbnail_dir)) {
            mkdir(public_path() . $thumbnail_dir, $mode = 0777, true);
        }
        $identifier = md5($uploadFile['name']) . '-' . time();
        $p = pathinfo($uploadFile['name']);
        //* Combine hash file name and extension *//
        $identifier .= "." . $p['extension'];

        //* Upload path * /
        $path = $filedir . $identifier;
        /* Thumbnail upload path */
        $thumbnail_path = $thumbnail_dir . $identifier;
        /* Path to public directory */
        $public_path = public_path() . $path;
        /* Path to thumbnail public directory */
        $public_thumbnail_path = public_path() . $thumbnail_path;

        if ($file->validateFile() && $file->save($public_path)) {
            /* Execute resize processing */
            //$this->resizing($public_path, $public_thumbnail_path);

            Lesson::find($id)->update([
                'video' => $identifier
            ]);
            $file->deleteChunks();
            return \Response::json('', 200);
        }
    }
}
