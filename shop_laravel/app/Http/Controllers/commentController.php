<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class commentController extends Controller
{

    private $comments;
    function __construct(comment $comment)
    {
        $this->comments=$comment;
    }
    public function index()
    {
        $comment=$this->comments->get();
        return view('admin.comment.index', compact('comment'));
    }
    public function update($id)
    {
        $comment = $this->comments->find($id);
         if($comment->status==1)
         {
            $comment->update([
                'status'=>0,
            ]);
         }
         else
         {
            $comment->update([
                'status'=>1,
            ]);
         }
        return redirect()->route('comment.index');
    }
    public function delete($id)
    {
        $this->comments->find($id)->delete();
        return redirect()->route('comment.index');
    }
    public function submitcomment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment_star = $request->comment_stars;
        $this->comments->create([
            'comment'=>$comment_content,
            'name'=>$comment_name,
            'product_id'=>$product_id,
            'star'=>$comment_star,
            'status'=>0,
        ]);
    }
    public function comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = comment::where('product_id', $product_id)->where('status',0)->get();
        $output = '';
        foreach ($comment as $comm) {
            $output .= '
            <li>
            <div class="review-heading">
			<h5 class="name">' . $comm->name . '</h5>
	        <p class="date">'. $comm->created_at .'</p>';
            $output .= ' <div class="review-rating"> ' ;
            for($i=1;$i<=5;$i++)
            {
                if($i<=$comm->star)
                {
                    $output .='<i class="fa fa-star"></i>';
                }
                else
                {
                    $output .='<i class="fa fa-star-o empty"></i>';
                }
            }
            $output .='</div>';
		    $output .= '</div>
		    <div class="review-body">
		    <p>'. $comm->comment .'</p>
		    </div>
            </li>'; 

        }
        echo $output;
    }
   
}
