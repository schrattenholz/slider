    <!-- Hero slider-->
    <section class="cz-carousel cz-controls-lg">
      <div class="cz-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
        <!-- Item-->
		<% loop Slides %>
        <div class="px-lg-5" style="background-color: rgb(180, 191, 94);<% if $BackgroundImage %>background:url('$BackgroundImage.URL');background-size:cover;background-position:center;<% end_if %>">
          <div class="d-lg-flex justify-content-between align-items-center pl-lg-4"><img class="d-block order-lg-2 mr-lg-n5 flex-shrink-0" src="<% if $TeaserImage %>$TeaserImage.Fill(967,500).URL<% else %>{$BaseHref}public/_resources/vendor/schrattenholz/slider/img/slider_default.png<% end_if %>" alt="$Title">
            <div class="position-relative mx-auto mr-lg-n5 py-5 px-4  order-lg-1" style="max-width: 42rem; z-index: 10;">
              <div class=" text-center text-lg-left text-lg-nowrap">
                <h2 class="font-weight-light pb-1 from-left">$SecondRow</h2>
                <h1 class="display-4 from-left delay-1"><% if $Title %><span>$Title</span><% end_if %></h1>
                <p class="font-size-lg pb-3 from-left delay-2">$ThirdRow</p>
				<% if $ActionText %>
				<a class="btn btn-primary scale-up delay-4" href="$ActionLink.Link">$ActionText <i class="czi-arrow-right ml-2 mr-n1"></i></a>
				<% end_if %>
              </div>
            </div>
          </div>
        </div>
        <% end_loop %>
      </div>
	  
    </section>