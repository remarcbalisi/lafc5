<h1>

    {{ $user->fname . ' ' . $user->lname }} (
    @foreach( $user->user_status()->get() as $u_status )
    {{$u_status->status->name . ', '}}
    @endforeach )

</h1>
<h5>{{$user->email}}</h5>

<p>Gender: {{ $user->gender->name }}</p>


<p>
  Position:
  @foreach( $user->user_roles()->get() as $user_role )
    {{ $user_role->role->name . ', ' }}
  @endforeach
</p>


<p>
  Contact:
  <ul>

    @foreach( $user->contacts()->get() as $contact )

    <li>
      {{ $contact->contact_type->name . ': ' . $contact->number }}
    </li>
    
    @endforeach
  </ul>
</p>


<p>

  Address:

  <ul>
  
  @foreach( $user->address()->get() as $addr )
    <li>
      {{ $addr->street . ' ' . $addr->unit_no . ' blah blah..' }}
    </li>
  @endforeach
  
  </ul>

</p>


<p>Department: {{ $user->department->name }}</p>