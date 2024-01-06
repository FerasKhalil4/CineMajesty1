@extends('layouts.app')

@section('content')
 Your Ticket 
<table>
    <thead>
        <tr>
        <th>id </th>
            <th>film name </th>
            <th>date</th>
            <th>start time</th>
            <th>hall</th>
           

       
        </tr>
    </thead>
    <tbody>
     
            <tr>
          
                <td>
   
   

               
                <td>{{ $booking->B_id }}</td>
             
                <td>{{ $film->name }}</td>
              
                <td>{{ $show->start_date}}</td>
                
                <td>{{ $showtime->start_time }}</td>
                
                
                <td>{{ $hall->H_id}} </td>
               
         
                </td>
             
            
            </tr>
        
   
    </tbody>
</table>
Your seats are:   <p>
@foreach($seats as $seat )
      
           {{ $seat->seat_num;}} <br>
        
           @endforeach
           </p>


           Your snacks are:   <p>
           @foreach($snacks as $snack )
     
           {{ $snack->name }}  <br>
     quntity:{{$snack ->Qty}}<br>
     @if($snack->book_snack != null)
      the free qunatity : {{$snack->Qty - $snack->book_snack}}
      <br>
     @endif
       
           @endforeach

           </p>


your total is : {{$booking->total}}

@endsection