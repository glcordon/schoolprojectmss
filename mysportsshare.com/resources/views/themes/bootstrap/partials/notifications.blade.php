@php $notifications_count = auth()->user()->unreadNotifications->count(); @endphp

@if(!isset($show_all_notifications))
    @php $unreadNotifications = auth()->user()->unreadNotifications->take(5); @endphp
    <li id="notification-list" class="dropdown">
        <a href="#_" id="notification-icon" class="dropdown-toggle">
            <i class="fa fa-bell-o"></i>
            @if($unreadNotifications && $notifications_count > 0) <span id="notification-count">{{ $notifications_count }}</span> @endif
        </a>
@else
    @php $unreadNotifications = auth()->user()->unreadNotifications->all(); @endphp
@endif

        <div class="notification-dropdown @if(!isset($show_all_notifications)){{ 'dropdown-menu' }}@else{{ 'notifications-page' }}@endif">
            @if(!isset($show_all_notifications))
                <div id="notification-header">
                    <div id="notification-head-content">
                        <span uk-icon="icon: bell" ></span> Notifications
                    </div>
                </div>
            @endif

                <div id="notifications-none" class="@if($notifications_count > 0){{ 'hidden' }}@endif">
                    <i class="fa fa-bell-o" style="display:block; position:relative; opacity:0.5; font-size:30px"></i>
                    All Caught Up!
                </div>
                <ul>


                    @foreach ($unreadNotifications as $index => $notification)

                        @php $notification_data = (object)$notification->data; @endphp
                        <li id="notification-li-{{ $index + 1 }}"><a href="{{ @$notification_data->link }}"><img src="{{ @$notification_data->icon }}"><span class="notification-content"><span class="notification-highlight">{{ @$notification_data->title }}</span><br>{{ @$notification_data->body }}</span></a>
                            <span class="notification-datetime">{{ \Carbon\Carbon::parse(@$notification->created_at)->format('l F, jS Y h:i:s A') }}</span>

                            <div id="notification-actions">
                                <i class="icon-more fa fa-ellipsis-v"></i>
                                <span class="mark-as-read" data-id="{{ $notification->id }}" data-listid="{{ $index+1 }}"><i class="icon-check fa fa-check"></i> Mark as Read</span>
                            </div>
                        </li>

                    @endforeach

                </ul>

            @if(!isset($show_all_notifications))
                <div id="notification-footer">
                    <a href="{{ route('wave.notifications') }}"><span uk-icon="icon: eye"></span>View All Notifications</a>
                </div>
            @endif
        </div>
@if(!isset($show_all_notifications))
    </li>
@endif