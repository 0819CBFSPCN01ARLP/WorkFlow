<aside class="col-12 col-sm-12 col-lg-4">

  <!-- START:TEAMS-BOX -->
  <article class="user-post widget-teams p-3 mb-3 teams bg rounded-border">
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12 pt-2 ico-box">
        <h3><i class="fas fa-graduation-cap fa-2x mr-2"></i><a class="teams" href="teams.php">Faculties</a></h3>
      </div>
      <div class="col-12 col-sm-12 col-lg-12 content-box">
        <ul class="mb-3 users">
          @forelse ($teams as $team)
            <li class="user-logo">
              {{$team->area}}
            </li>
          @empty
        @endforelse
        </ul>
      </div>
    </div>
  </article>
  <!-- END:TEAMS-BOX -->

  <!-- START:HASHTAG-BOX -->
  <article class="user-post p-3 mb-3 hashtag bg rounded-border">
    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12 pt-2 ico-box">
        <h3><i class="fas fa-hashtag fa-2x mr-2"></i> Hashtags</h3>
      </div>
      <div class="col-12 col-sm-12 col-lg-12 content-box">
        <p><a href="">#hastag1</a> <a href="">#hastag2</a> <a href="">#hastag1</a> <a href="">#hastag2</a> <a href="">#hastag1</a> <a href="">#hastag2</a></p>
      </div>
    </div>
  </article><!-- END:HASHTAG-BOX -->

</aside>
