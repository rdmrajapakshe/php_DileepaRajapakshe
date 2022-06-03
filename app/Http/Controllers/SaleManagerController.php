<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesTeam;
use Illuminate\Support\Facades\DB;

class SaleManagerController extends Controller
{
    //View
    public function index(){
        $data = SalesTeam::all();
        return view('sales_team')->with('sales_table', $data);
    }

    //Add Sale Member
    public function Add_Member(Request $request){
        $this->validate($request, [
            'FullName' => 'required',
            'Email' => 'required',
            'Telephone' => 'required|min:9|max:10',
            'JoinedDate' => 'required',
            'CurrentRoutes' => 'required',
            'Comments' => 'required',
        ]);
        try {
            $Sale_Team = new SalesTeam;
            $Sale_Team->Name = $request->FullName;
            $Sale_Team->Email = $request->Email;
            $Sale_Team->Telephone = $request->Telephone;
            $Sale_Team->Joined_Date = $request->JoinedDate;
            $Sale_Team->Current_Rout = $request->CurrentRoutes;
            $Sale_Team->Comments = $request->Comments;
            $Sale_Team->save();
        } catch (\Throwable $th) {

        }

        return redirect('/');
    }
        //Add Sale Member
        public function Edit_Member(Request $request){
            $this->validate($request, [
                'FullName' => 'required',
                'Email' => 'required',
                'Telephone' => 'required|min:9|max:10',
                'JoinedDate' => 'required',
                'CurrentRoutes' => 'required',
                'Comments' => 'required',
            ]);
            try {
                $Sale_Team = new SalesTeam;
                $Sale_Team = SalesTeam::where('id', $request->id)->first();
                $Sale_Team->Name = $request->FullName;
                $Sale_Team->Email = $request->Email;
                $Sale_Team->Telephone = $request->Telephone;
                $Sale_Team->Joined_Date = $request->JoinedDate;
                $Sale_Team->Current_Rout = $request->CurrentRoutes;
                $Sale_Team->Comments = $request->Comments;
                $Sale_Team->save();
            } catch (\Throwable $th) {
    
            }
    
            return redirect('/');
        }
        // Delete Member
        public function Delete_Member($id)
        {
            try {
                DB::delete('delete from sales_teams where id=?',[$id]);
            } catch (\Throwable $th) {
 
            }
            return redirect('/');
        }
        // Get Edit Info
    public function Get_Edit_Data(Request $request){
        $id = $request->id;
        $data = SalesTeam::all()->where('id', $id)->first();
        return response()->json(['success' => $data]);
    }
}
