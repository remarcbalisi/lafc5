<h1>User List</h1>

<ol>
@foreach( $users as $user )
<a href="{{ route('view-single-user', ['user_id' => $user->id]) }}">
  <li> 
    {{$user->fname . ' ' . $user->lname}} (
    @foreach( $user->user_status()->get() as $u_status )
    {{$u_status->status->name . ', '}}
    @endforeach )
  </li>
</a>
@endforeach
</ol>