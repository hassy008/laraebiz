@extends('admin.admin_master')
@section('title')
Manage Social Media
@endsection

@section('mainContent')

<div class="row-fluid">
  <div class="span12">
     <div class="widget green">
      <div class="widget-title">
        <h4><i class="icon-reorder"></i> Add Social Media</h4>
        <span class="tools">
          <a href="javascript;" class="glyphicon-chevron-down"></a>
        {{--  <a href="javascript;" class="icon-remove"></a> --}}
        </span>   
      </div>

   <div class="widget-body">
 <!--BEGIN FORM-->
 <h3 style="color:green" align="center">
  <?php
    $message = Session::get('message');
    if($message){
      echo '<b>'.$message.'</b>';
      Session::put('message');
    }
  ?>
 </h3>
    {!!Form::open(['url'=>'/save-social','method'=>'post','class'=>'form-horizontal']) !!}
    {{-- <form action="" class="form-horizontal" method="post" accept-charset="utf-8"> --}}
   
 {{--  @foreach($all_social_account as $all_social_account)    
        <div class="controls">
          <input type="hidden" class="span6" name="id" value="{{ $id->id }}">  
        </div> --}}
      <div class="control-group">
        <label class="control-label">Facebook</label>
        <div class="controls">
          <input type="text" class="span6" name="facebook" value="{{ $all_social_account->facebook }}"> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Instagram</label>
        <div class="controls">
          <input type="text" class="span6" name="instagram" value="{{ $all_social_account->instagram }}"> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Pinterest</label>
        <div class="controls">
          <input type="text" class="span6" name="pinterest" value="{{ $all_social_account->pinterest }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">Youtube</label>
        <div class="controls">
          <input type="text" class="span6" name="youtube" value="{{ $all_social_account->youtube }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">Twitter</label>
        <div class="controls">
          <input type="text" class="span6" name="twitter" value="{{ $all_social_account->twitter }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">LinkedIn</label>
        <div class="controls">
          <input type="text" class="span6" name="linkedIn" value="{{ $all_social_account->linkedIn }}"> 
        </div>
      </div>
       <div class="control-group">
        <label class="control-label">Google Plus</label>
        <div class="controls">
          <input type="text" class="span6" name="google_plus" value="{{ $all_social_account->google_plus }}"> 
        </div>
      </div>
      
       <div class="control-group">
        <label class="control-label">Skype</label>
        <div class="controls">
          <input type="text" class="span6" name="skype" value="{{ $all_social_account->skype }}"> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Phone</label>
        <div class="controls">
          <input type="text" class="span6" name="phone_number" value="{{ $all_social_account->phone_number }}"> 
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Comp. Email</label>
        <div class="controls">
          <input type="text" class="span6" name="email" value="{{ $all_social_account->email }}"> 
        </div>
      </div>

<div class="control-group">
  <div class="span12">
    <button type="submit" name="btn" class="btn btn-success btn-block">Save Social</button>  
  </div>
</div>

   {!! form::close() !!}    
   {{--   </form> --}}
     </div>
      
    </div>

  </div>  
</div>


@endsection