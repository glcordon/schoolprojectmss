<div id="plans" class="uk-margin-medium-bottom">
    @php $default_plan = ''; @endphp
    @foreach(Wave\Plan::all() as $plan)
        @php $features = explode(',', $plan->features); @endphp

        @php
            $plan_active = false;
            if(auth()->guest() && $plan->default){
                $plan_active = true;
            } else if(!auth()->guest() && !auth()->user()->subscribed('main') && $plan->default){
                $plan_active = true;
            } else if(!auth()->guest() && auth()->user()->subscribed('main') && auth()->user()->subscribedToPlan($plan->plan_id, 'main')){
                $plan_active = true;
            }
        @endphp


        <div class="plan uk-grid @if($plan_active){{ 'plan-active' }}@endif" data-plan="{{ $plan->plan_id }}">
            <div class="uk-width-1-2 plan-left">
                <h3 class="uk-card-title uk-text-left uk-margin-remove-bottom">{{ $plan->name }}</h3>
                <p class="uk-text-left uk-text-muted uk-margin-remove-bottom uk-margin-remove-top">
                    {{ $plan->price }}
                    <span class="plan-features" id="plan-{{ strtolower(str_slug($plan->name)) . $plan->id }}">Features</span>

                </p>

            </div>
            <div class="uk-width-1-2 plan-right">
                <div class="uk-text-right uk-align-right">
                    <div class="uk-button uk-button-primary"><span class="select_plan">@if(!auth()->guest() && auth()->user()->subscribed('main')){{ 'Switch to this Plan' }}@else{{ 'Select Plan' }}@endif</span><span class="selected_plan"><span uk-icon="icon: check; ratio: 0.75"></span> @if(!auth()->guest() && auth()->user()->subscribed('main')){{ 'Your Current Plan' }}@else{{ 'Selected' }}@endif</span></div>
                </div>
            </div>
            <ul class="feature-list" uk-drop="animation: uk-animation-slide-top-small; toggle: #plan-{{ strtolower(str_slug($plan->name)) . $plan->id }}">
                @foreach($features as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
            <div class="col-md-1-1 plan-description">
                {{ $plan->description }}
            </div>
        </div>

        @if($plan->default)@php $default_plan = $plan->plan_id @endphp@endif

    @endforeach
</div>
<input type="hidden" name="plan" id="planInput" value="{{ $default_plan }}">