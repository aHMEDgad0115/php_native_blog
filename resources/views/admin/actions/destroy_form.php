<?php
if(!empty($url)){
    $rand =md5(rand(000,999));
}
?>

<!-- Button trigger modal -->
   <a href="#" data-bs-toggle="modal" data-bs-target="#deleteform{{$rand}}">
        <i class="fa fa-trash"></i>
   </a>


<!-- Modal -->
<div class="modal fade" id="deleteform{{$rand}}" tabindex="-1" aria-labelledby="deleteFormLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-body">
        <form action="{{$url}}" method="post">
            <input type="hidden" name="_method" value="post" />
            <div class="alert alert-danger">
                {{trans('admin.delete_message')}}
            </div>
    
            <button type="submit" class="btn btn-danger" >{{trans('admin.delete')}}</button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" >{{trans('admin.cancel')}}</button>
       </form>

    </div>
     
    </div>
  </div>
</div>
