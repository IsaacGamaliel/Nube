<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function create(){
        return view('admin.files.create');
    }

    private $img_ext = ['jpg', 'png', 'jpeg', 'gif', 'PNG', 'JPEG', 'GIF', 'JPG'];
    private $video_ext = ['mp4', 'avi', 'MP4', 'AVI', 'MPEG'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'DOC', 'DOCX', 'PDF', 'ODT'];
    private $audio_ext = ['mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WNA', 'OGG'];


    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getType($ext){
        if(in_array($ext, $this->img_ext))
        {
            return 'image';
        }
        if(in_array($ext, $this->video_ext))
        {
            return 'video'; 
        }
        if(in_array($ext, $this->audio_ext))
        {
            return 'audio';
        }
        if(in_array($ext, $this->document_ext))
        {
            return 'documento';
        }
    }

    private function allExtensions(){
        return array_merge($this->img_ext, $this->video_ext, $this->audio_ext, $this->document_ext); 
    }
}
