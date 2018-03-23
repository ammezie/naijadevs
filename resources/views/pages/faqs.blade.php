@extends('layouts.app')

@section('title', 'FAQs')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'FAQs')
@section('og-url', url('/faqs'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'FAQs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="ui basic segment bgWhite roundBordered">
            <h1 class="ui dividing header">FAQs</h1>

            <div class="ui styled fluid accordion">
                <div class="title">
                    <i class="dropdown icon"></i>
                    What is Naijadevs?
                </div>
                <div class="content">
                    <p class="transition hidden">
                         Naijadevs is a job site that connects talented Nigerian developers and designers with companies and individuals who need them. It helps companies get their jobs across more Nigerian developers and also makes it easier for Nigerian developers apply for jobs.
                    </p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    Why another job site?
                </div>
                <div class="content">
                    <p class="transition hidden">
                        It is true that there are numerous job sites out there. Naijadevs is not your regular job site. It is a job site created specifically for some group of people. These group of people are <strong>Nigerian developers and designers</strong>. Naijadevs was developed by Nigerian developers for Nigerian developers. So, we know the pain of having to search regular job sites for dev related jobs. Hence, the need for Naijadevs.
                    </p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    How does it work?
                </div>
                <div class="content">
                    <p class="transition hidden">
                        Basically, Naijadevs works in two steps:
                        <ol>
                            <li>
                                A company or an individual looking to employ or hire a Nigerian developer posts a job with all the details about the job and the requirements they want from a developer. The job can be full time, part time, contract, freelance or even internship job. Companies and individuals can choose how they want developers to apply to their jobs.
                            </li>
                            <li>
                                Developers on the other hand, browse through dozen for job openings posted by these companies and individuals, then apply to the ones that suit their needs and skill set.
                            </li>
                        </ol>
                    </p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    Why should I post my jobs on Naijadevs?
                </div>
                <div class="content">
                    <p class="transition hidden">
                        Posting your jobs on Naijadevs is the best way to get your jobs across the fast and ever growing communities of talented Nigerian developers and designers. We are part of these communities and we'll make sure they see your jobs.

                        <p>There are also developers on waiting list to be notified of new jobs.</p>
                    </p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                   Will Naijadevs screen developers for me?
                </div>
                <div class="content">
                    <p class="transition hidden">
                        No. We only present your jobs to developers looking for such jobs. Once developers apply to your jobs, you can then screen and test them however you want.
                    </p>
                </div>

                <div class="title">
                    <i class="dropdown icon"></i>
                    Is Naijadevs free?
                </div>
                <div class="content">
                    <p class="transition hidden">
                        Posting jobs on Naijadevs is <strong>FREE</strong> while in Beta. However, once we are out of beta, posting jobs will be at a certain price. See the <a href="{{ url('/pricing') }}">pricing</a> page for more details.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection