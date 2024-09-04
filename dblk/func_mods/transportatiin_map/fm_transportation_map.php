<? 
function fm_transportation_map (
    $headline = null,
    $foot_map_image = null,
    $bike_map_image = null,
    $car_map_image = null
)
{  ?>

<div class="section-container">
    <div class="map-container">
		<div class="row headline-row map-tabs">
			<img class="map-blob" src="/wp-content/themes/jr3/_images/blobs/blob-bg-map.svg" alt="" role="presentation">
	    	<div class="section-heading columns small-12 medium-6">
		    	<h2><?= $headline; ?></h2>
	    	</div>
			<div class="small-12 medium-6 columns map_tabs">
				<ul class="tabs" data-tabs id="map-tabs">
				  <li class="tab-links is-active"><button type="button" class="fm_button primary inverted" id="button1" onclick="openTab(event, 'tab1')" aria-selected="true"><p>By Foot</p></button></li>
				  <li class="tab-links"><button type="button" class="fm_button primary inverted" id="button2"  onclick="openTab(event, 'tab2')"><p>By Bike</p></button></li>
				  <li class="tab-links"><button type="button" class="fm_button primary inverted" id="button3"  onclick="openTab(event, 'tab3')"><p>By Car</p></button></li>
				</ul>
			</div>
		</div>
		<div class="row map-content">
			<div class="small-12 columns">
				<div class="tabs-content" data-tabs-content="map-tabs">
					<div class="tabs-panel is-active" id="foot">
						<div class="row">
							<div class="column tabcontent" id="tab1">
								<img src="<?= $foot_map_image; ?>" alt="Walkable Map">
							</div>
						</div>
					</div>
					<div class="tabs-panel" id="bike">
					    <div class="row">
						  	<div class="column tabcontent" id="tab2">
						  		<img src="<?= $bike_map_image; ?>" alt="Bikeable Map">
						  	</div>
					  </div>
					</div>
					<div class="tabs-panel" id="car">
						<div class="row">
							<div class="column tabcontent" id="tab3">
								<img src="<?= $car_map_image; ?>" alt="Driveable Map">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>


// Show the first tab content by default
var defaultTabContent = document.getElementById("tab1");
defaultTabContent.style.display = "block";
var defaultButton = document.getElementById("button1");
defaultButton.classList.add('active');

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;

  // Hide all tab content
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove active class from all tab buttons
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
   buttons = document.getElementsByClassName("fm_button");
  for (i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("active");
  }

  // Show the selected tab content
  document.getElementById(tabName).style.display = "block";

  // Add the active class to the clicked tab button
  evt.currentTarget.classList.add("active");
}

// Make the first tab button active by default
// var defaultTabButton = document.getElementsByClassName("tablinks")[0];
// defaultTabButton.classList.add("active");

</script>

<?  }