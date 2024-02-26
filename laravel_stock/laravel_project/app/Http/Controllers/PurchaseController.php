<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\SubmitRequest;
use App\Models\SubmitModel;

class PurchaseController extends Controller
{
    public function submit(SubmitRequest $req) {
        /*
        $validation = $req->validate([
            'text' => 'required|min:5|max:20',
            'meeting-time' => 'required|date|after:tomorrow'
            ]);
        */
        $submit = new SubmitModel();
        $submit->stock = $req->input('stock')[0];
        $submit->box_count = $req->input('box_count')[0];
        $submit->details = $req->input('text');
        $submit->receive_date = $req->input('meeting-time');
        
        $submit->save();
        
        return redirect()->route('submitAll');
        //return dd($req->input('text'),$req->input('meeting-time'), $req);
    }
    
    public function updateMessageResult($id, SubmitRequest $req) {
            
        $submit = SubmitModel::find($id);
        $submit->stock = $req->input('stock')[0];
        $submit->box_count = $req->input('box_count')[0];
        $submit->details = $req->input('text');
        $submit->receive_date = $req->input('meeting-time');
        
        $submit->save();
        
        return redirect()->route('submitAll');
        //return dd($req->input('text'),$req->input('meeting-time'), $req);
    }
    
    public function deleteMessage($id) {
        SubmitModel::find($id) -> delete();
        return redirect()->route('submitAll');
    }
    
    public function deleteMulti() {
        //SubmitModel::whereIn('id', $delete)->delete();
        $ids = [];
        if(!empty($_POST['multiselect'])){
            $array = $_POST['multiselect'];
            while ($idToDelete = current($array)) {
                if ($idToDelete == 'on') {
                    SubmitModel::find(key($array)) -> delete();
                    array_push($ids, key($array));
                }
                next($array);
            }
            
        }
        //print_r($ids);
        return redirect()->route('submitAll');
    }
    
    public function allData() {
        $submit = SubmitModel::orderBy('box_count')->get();
        return view('messages', ['data' => $submit]);
    }
    
    public function showOneMessage($id) {
        $submit = new SubmitModel;
        return view('one-message', ['data' => $submit->find($id)]); 
    }
    
    public function updateMessage($id) {
        $submit = new SubmitModel;
        return view('update-message', ['data' => $submit->find($id)]); 
    }
}
