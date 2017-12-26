<!DOCTYPE html>
<html lang="en">
<head>

    @include('traineee.layout.head')

    <style media="screen">
    .style-3::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5  ;
    }

    .style-3::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5  ;
    }

    .style-3::-webkit-scrollbar-thumb
    {
        background-color: #1B1617  ;
    }
    </style>
</head>
<body class="hold-transition skin-purple sidebar-mini style-3">

<div class="wrapper">
    @include('partial/_errors')
    @include('traineee.layout.header')

    @include('traineee.layout.sidebar')

    @section('main-content')

    @show
    @include('traineee.layout.footer')

</div>

</body>
</html>
