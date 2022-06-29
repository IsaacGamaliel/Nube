<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class FilesController extends Controller
{

    private $img_ext = ['jpg', 'png', 'jpeg', 'gif', 'PNG', 'JPEG', 'GIF', 'JPG'];
    private $video_ext = ['mp4', 'avi', 'MP4', 'AVI', 'MPEG'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'DOC', 'DOCX', 'PDF', 'ODT'];
    private $audio_ext = ['mp3', 'mpga', 'wma', 'ogg', 'MP3', 'MPGA', 'WNA', 'OGG'];


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('admin.files.create');
    }

    public function images(){
		$images = File::whereUserId(auth()->id())
			->OrderBy('id', 'desc')->where('type', '=', 'image')->get();
		$folder = str_slug(Auth::user()->name . '-' . Auth::id());
        
		return view('admin.files.type.images', compact('images', 'folder'));
	}

    public function videos(){

        return view('admin.files.type.videos');       
    }

    public function audios(){
        $audios = File::whereUserId(auth()->id())
        ->OrderBy('id', 'desc')->where('type', '=', 'audio')->get();
        $folder = str_slug(Auth::user()->name . '-' . Auth::id());
    
        return view('admin.files.type.audios', compact('audios', 'folder'));
    }

    public function documents(){
        
        return view('admin.files.type.documents');

    }

    public function store(Request $request){
        $max_size = (int)ini_get('upload_max_filesize')*1000;
        $all_ext = implode(',', $this->allExtensions());

        $this->validate(request(), [
            'file.*' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        $uploadFile = new File();

        $file = $request->file('file');
        $name = time().$file->getClientOriginalExtension();
        $ext = $file->getClientOriginalExtension();
        $type = $this->getType($ext);

        if ($type) {
            if (Storage::putFileAs( '/public/' . $this->getUserFolder() . '/' . $type . '/' , $file, $name . '.' . $ext)){
                  $uploadFile::create([ 'name' => $name, 'type' => $type, 'extension' => $ext, 'user_id' => Auth::id() ]); 
             }
        
            return back()->with('info', ['success', 'El archivo se ha subido exitosamente']);
       } //Aquí cierra el if de $type
        
       else {
            return back()->with('info', ['danger', '¡Error! No podemos subir ese tipo de archivo']);
       }

        if(Storage::putFileAs('/public/' . $this->getUserFolder() . '/' . $type . '/', $file,
        $name . '.' . $ext)){
            $uploadFile::create([
                'name'  =>$name,
                'type'  =>$type,
                'extension' =>$ext,
                'user_id' =>  Auth::id()
            ]);
        }

        return back()->with('info',['success',' El archivo se ha subido correctamente']);
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

    private function getUserFolder(){
        $folder =Auth::user()->name . '-' . Auth::id();
        return str_slug($folder);
    }
}
