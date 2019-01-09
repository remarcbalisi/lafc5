<h1>User List</h1>

<ul>
@foreach( $users as $user )
<a href="#">
  <li> 
    {{$user->fname . ' ' . $user->lname}} (
    @foreach( $user->user_status()->get() as $u_status )
    {{$u_status->status->name . ', '}}
    @endforeach )
  </li>
</a>
@endforeach
</ul>