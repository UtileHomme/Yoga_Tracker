<!DOCTYPE html>
<html lang="en">
<head>

    @include('traineee.layout.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">

    <div class="wrapper">

        @include('traineee.google.gheader')

        @include('traineee.google.gsidebar')

        @section('main-content')

        @show

        @include('traineee.layout.footer')

    </div>

</body>
</html>
