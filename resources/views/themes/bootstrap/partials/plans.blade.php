<div id="plans">
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


        <div class="plan row @if($plan_active){{ 'plan-active' }}@endif" data-plan="{{ $plan->plan_id }}">
            <div class="col-md-6 plan-left">
                <h3 class="text-left">{{ $plan->name }}</h3>
                <p class="text-left pt-1 mb-0">
                    {{ $plan->price }}
                    @php
                        $plan_features_html = '<ul class="feature-list">';
                        foreach($features as $feature):
                            $plan_features_html .= '<li>' . $feature . '</li>';
                        endforeach;
                        $plan_features_html .= '</ul>';
                    @endphp
                    <span class="plan-features" data-trigger="hover" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom" data-content="{{ $plan_features_html }}">Features</span>
                </p>

            </div>
            <div class="col-md-6 plan-right">
                <div class="text-right">
                    <div class="btn btn-primary mt-2"><span class="select_plan">@if(!auth()->guest() && auth()->user()->subscribed('main')){{ 'Switch to this Plan' }}@else{{ 'Select Plan' }}@endif</span><span class="selected_plan"><i class="fa fa-check"></i> @if(!auth()->guest() && auth()->user()->subscribed('main')){{ 'Your Current Plan' }}@else{{ 'Selected' }}@endif</span></div>
                </div>
            </div>
            <div class="col-md-1-1 plan-description">
                {{ $plan->description }}
            </div>
        </div>

        @if($plan->default)@php $default_plan = $plan->plan_id @endphp@endif

    @endforeach
</div>
<input type="hidden" name="plan" id="planInput" value="{{ $default_plan }}">