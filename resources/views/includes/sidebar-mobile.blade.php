<section class="col-12 col-sm-12 mt-3 mb-3 mobile-sidebar">

  <ul class="nav nav-pills" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#pills-teams" role="tab" aria-selected="true"><i class="fas fa-users fa-2x mr-2" aria-hidden="true"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-hashtags" role="tab" aria-selected="false"><i class="fas fa-hashtag fa-2x mr-2" aria-hidden="true"></i></a>
    </li>
  </ul>
  <!-- END: TABSS -->

  <div class="tab-content p-3 bg" id="pills-tabContent">

    <div class="tab-pane widget-teams fade active show" id="pills-teams" role="tabpanel">
      <ul class="users">
        @foreach($teams as $team)
          <li>
            <a href="/teams/{{ $team->id }}">{{$team->area}}</a>
          </li>
        @endforeach
      </ul>
    </div>
    <!-- END: CONTENT-TAB-TEAMS -->

    <div class="tab-pane fade" id="pills-hashtags" role="tabpanel">
        <p class="hastags"><a href="">#meetings</a> <a href="">#importantDates</a> <a href="">#holidays</a> <a href="">#elections</a> <a href="">#schedules</a> <a href="">#olympics</a></p>
    </div>
    <!-- END: CONTENT-TAB-HASHTAGS -->


  </div>
  <!-- END: CONTENT-TABS -->

</section>
