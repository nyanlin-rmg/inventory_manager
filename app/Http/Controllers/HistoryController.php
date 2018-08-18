<?php
namespace App\Http\Controllers;
use App\Warehouse;
use App\Item;
use App\Category;
use App\History;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HistoryController extends Controller
{
	public function destroy($id)
	{
		$history = History::find($id);
		$history->delete();
		return redirect('warehouses/history');
	}
	public function destroy_all()
	{
		$histories = History::all();
		foreach ($histories as $history) {
			$history->delete();
		}
		return redirect('warehouses/history');
	}
	public function destroy_selected(Request $request)
	{
		$histories_id = $request->history;
		if($histories_id == null) {
			return back();
		} else {			
			foreach ($histories_id as $id) {
				History::destroy([$id]);
			}
		}
		return redirect('warehouses/history');
	}
}
?>