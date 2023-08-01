<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $orders = App\Models\Orders::where('status', 'pending')->get();
                    @endphp
                    
                    <h2>Orders</h2>
                    
                    <ul>
                        @foreach($orders as $order)
                            <li>
                                Order ID: {{ $order->id }}<br>
                                Customer: {{ $order->customer->name }}<br>
                                Total: {{ $order->total }}<br>
                                
                                @if($order->delivery_boy_id)
                                    Delivery Boy: {{ $order->deliveryBoy->name }}
                                @else
                                    <form action="{{ route('assign_delivery_boy', ['order' => $order->id]) }}" method="POST">
                                        @csrf
                                        
                                        <select name="delivery_boy_id">
                                            <option value="">Select Delivery Boy</option>
                                            @foreach($deliveryBoys as $deliveryBoy)
                                                <option value="{{ $deliveryBoy->id }}">{{ $deliveryBoy->name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        <button type="submit">Assign Delivery Boy</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
