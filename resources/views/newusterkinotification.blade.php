<style>

a
{text-decoration: none;
 background-color: none;
 color:black; }
.powiadomienie
{
    background: rgb(255,255,255);
background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(227,237,252,1) 0%, rgba(142,235,254,1) 100%);

}
    </style>


<a href={{url("note/{$notification->data['usterkimodel']['id_usterki']}") }} class="dropdown-item powiadomienie">

   <span class="float-left text-muted text-sm" style="margin:0px 10px 0px 0px"> <i class="fa fa-envelope mr-2" style="color:green"></i> 

    {{$notification->created_at}}  </span>           <strong>    {{$notification->data['usterkimodel']['autor']}} </strong> dodał nowy wpis. 
  
  </a>