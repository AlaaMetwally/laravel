@extends('layouts.master')

@section('content')


<div class="container">
        <div class="table-wrapper">         

            <table class="table table-bordered">
            <th style="background-color:#D3D3D3">DashBoard</th>        

                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
            </table>
            You are logged in!
        </div>
    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
