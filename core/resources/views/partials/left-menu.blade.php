
<div class="list-group">
    <a href="{{route('moneyTransfer')}}" class="@if(request()->path() == 'user/money-transfer')  active @endif list-group-item  left-menu-padding">
        @lang('Money transfer')<span class="text-right"><i class="icon-paper-plane icons"></i></span>
    </a>

    <a href="{{route('user.trx')}}" class=" @if(request()->path() == 'user/transactions')  active @endif list-group-item  left-menu-padding">
        @lang('Transactions')<span class="text-right"><i class="icon-hourglass icons"></i>
						</span>
    </a>
    <a href="{{route('exchange')}}" class=" @if(request()->path() == 'user/exchange')  active @endif list-group-item left-menu-padding">
        @lang('Currency exchange')<span class="text-right"><i class="icon-refresh icons"></i>
						 </span></a>
    <a href="{{route('invoice.inbox')}}" class=" @if(request()->path() == 'user/invoice')  active @endif list-group-item left-menu-padding">
        @lang('Invoices') <span class="text-right"><i class="icon-credit-card icons"></i></span>
    </a>

    <a href="{{route('vouchers')}}" class=" @if(request()->path() == 'user/vouchers')  active @endif list-group-item left-menu-padding">
        @lang('Vouchers') <span class="text-right"><i class="icon-diamond icons"></i></span>
    </a>
    <a href="{{route('user.ticket')}}" class="@if(request()->path() == 'user/supportTicket')  active @endif list-group-item left-menu-padding">
        @lang('Support') <span class="text-right"><i class="icon-support icons"></i></span>
    </a>
</div>