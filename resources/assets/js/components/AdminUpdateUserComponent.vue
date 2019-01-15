<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                        <h3>{{user.fname + ' ' + user.lname}}</h3>

                    </div>

                    <div class="panel-body">
                       
                       @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if (session('success_msg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success_msg') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('update-user', ['user_id'=>$user->id])}}" method="POST">



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'user',
            'gender',
            'teamLeaders',
            'addressTypes',
            'contactTypes',
            'roles',
            'departments'
        ],
        mounted() {
            // this.user = JSON.parse(this.user);
            console.log('Component mounted.')
        }
    }
</script>
