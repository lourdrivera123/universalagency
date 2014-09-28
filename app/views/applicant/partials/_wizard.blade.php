<div id="bootstrap-wizard-1" class="col-sm-12">
    <div class="form-bootstrapWizard">
        <ul class="bootstrapWizard form-wizard">
            @if(checkresumeifcomplete())
            <li class="complete" data-target="#step1">
                <a href='javascript:void(0)'> <span class="step"><i class="fa fa-check"></i></span> <span class="title">Update Resume</span> </a>
            </li>
            @else
            <li class="active" data-target="#step1">
                <a href="{{ URL::to('create_resume') }}"> <span class="step">1</span> <span class="title">Create Resume</span> </a>
            </li>
            @endif

            @if(!checkresumeifcomplete() && is_null(getPersonalityResult()))
            <li data-target="#step2">
                <a href="javascript:void(0)"><span class="step">2</span> <span class="title">Take Personality Test</span> </a>
            </li>
            @elseif(is_null(getPersonalityResult()))
            <li class="active" data-target="#step2">
                <a href="{{ URL::to('pleasetakepersonalitytest') }}" > <span class="step">2</span> <span class="title">Take Personality Test</span> </a>
            </li>
            @else
            <li class="complete" data-target="#step2">
                <a href="{{ URL::to('personalityresult/'.getPersonalityResult()->hash) }}" target="blank"> <span class="step"><i class="fa fa-check"></i></span> <span class="title">Personality Test Result</span> </a>
            </li>
            @endif

            @if(is_null(getIQResult()) && is_null(getPersonalityResult()))
            <li data-target="#step3">
                <a href="javascript:void(0)" > <span class="step">3</span> <span class="title">Take IQ Test</span> </a>
            </li>
            @elseif(is_null(getIQResult()))
            <li class="active" data-target="#step3">
            <a href="{{ URL::to('pleasetakeiqtest') }}" > <span class="step">3</span> <span class="title">Take IQ Test</span> </a>
            </li>
            @else
            <li class="complete" data-target="#step3">
                <a href="{{ URL::to('iqtestresult/'.getIQResult()->hash) }}" target="blank"> <span class="step"><i class="fa fa-check"></i></span> <span class="title">IQ Test Result</span> </a>
            </li>
            @endif

            @if(checkresumeifcomplete() && !is_null(getPersonalityResult()) && !is_null(getIQResult()))
            <li data-target="#step4" class="complete">
                <a href="{{ URL::to('joblist') }}"> <span class="step"><i class="fa fa-check"></i></span> <span class="title">Browse and Apply for Jobs</span> </a>
            </li>
            @else
            <li data-target="#step4">
                <a href="javascript:void(0)"> <span class="step">4</span> <span class="title">Apply for jobs</span> </a>
            </li>
            @endif

        </ul>
    </div>
</div>
<br/>
<div class="divider stripe-1"></div>