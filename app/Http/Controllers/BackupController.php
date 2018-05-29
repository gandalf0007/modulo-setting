<?php
namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Controllers\Controller;
use Soft\Http\Requests;
use Phelium\Component\MySQLBackup;
use Illuminate\Http\File;

use Soft\Backup;

use Notification;
use DataTables;
use Debugbar;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Auth;
use Flash;
use Toastr;
use Carbon\Carbon;
use Exception;
use MP;
use Input;
use Hash;
use View;



class BackupController extends AdminBaseController
{

 public function index()
    {
        $backups = Backup::all();

        return view("admin.configuracion.backup.export.index",compact('backups'));
    }

    
  
  public function BackupCreate(Request $request)
    {
      
    	$Dump = new MySQLBackup('localhost', 'root', '', 'sharkestudio');
		$Dump->setFilename('backup_'.time());
        $nombreArchivo = $Dump->setFilename('backup_'.time());



        if ($request['formato'] == 0 ) {
            $formato = "sql";
        }
        if ($request['formato'] == "zip") {
            $formato = $request['formato'];
            $Dump->setCompress('zip');
        }
        if ($request['formato'] == "gz"){
            $formato = $request['formato'];
            $Dump->setCompress('gz');
        }
         if ($request['formato'] == "gzip"){
            $formato = $request['formato'];
            $Dump->setCompress('gzip');
        }

		
		


         $backup = backup::create([
            'nombre' =>$nombreArchivo->filename,
            'tipo' =>$formato,
            'url'=>$request['url'],
            ]);


       
        $Dump->setDownload(true);
        $Dump->dump();
			
		
        return Redirect::back();
    }





    public function delete($id){
        
            
        try {
            $backup = Backup::find($id);
            $ruta = $backup->nombre.".".$backup->tipo;
            $disk = Storage::disk('raiz')->delete($ruta);
            $backup->delete();
            Alert::success('Mensaje existoso', 'Backup Eliminado');
            return Redirect::back();
       
        }
         catch (\Exception $e) {
            Alert::error('Ups!!', 'El Backup no se pudo Eliminado');
            return Redirect::back();
            }
        }

}
