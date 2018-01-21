@if($count_for_names>0)
@for($j=0;$j<$count_for_names;$j++)
<div class="box-comment ">


<!-- User image -->
<img class="img-circle img-sm" src="{{asset(Storage::disk('local')->url($image_per_comments[$j])) }}" alt="User Image">


<div class="comment-text">
    <span class="username">
        {{$names_per_comments[$j]}}
        <span class="text-muted pull-right">{{$time_per_comments[$j]}}</span>
    </span><!-- /.username -->
    {{$comments_per_workout[$j]}}
</div>
<!-- /.comment-text -->
</div>

@endfor
@endif
