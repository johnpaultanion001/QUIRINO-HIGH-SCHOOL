
@component('mail::message')
<style>
    .center {
            margin: auto;
            width: 100%;
            text-align: center;
            text-align: center;
            color: gray;
        }
    hr{
        border-top: .1em solid whitesmoke;
    }
</style>

<div class="center">
    <img src="https://cdn-icons-png.flaticon.com/512/1592/1592461.png" alt="send" width="100"/>
    <br>
    <hr>
        <strong style="font-size: 15px;">{{ $content['message'] }}</strong>
</div>



 

@endcomponent
