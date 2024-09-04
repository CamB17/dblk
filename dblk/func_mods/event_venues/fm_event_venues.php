<? function fm_event_venues(
		$venues = null
	)
{
    if(!empty($venues)) {
        $colors = array('red', 'teal', 'marigold');
        $count = 0;
?>
    <div class="row">
        <?
        foreach ($venues as $venue) :
            $title = $venue['title'];
            $image = $venue['image'];
            $image_source = fly_get_attachment_image_src( $image["ID"], array( 385, 240 ), true )['src'];
            $capacity = $venue['capacity'];
            $description = $venue['description'];
            $contact = $venue['contact'];
            $contact_name = $contact['name'];
            $contact_phone_number = $contact['phone_number'];
            $contact_email_address = $contact['email_address'];
            $more_information_button = $venue['more_information_button'];
            $color = $colors[$count];
        ?>
            <div class="small-12 medium-6 venue_wrap column">
                <div class='single_venue bg_tan'>
                    <div class='top_content'>
                        <? if($title) : ?>
                            <h3><?= $title; ?></h3>
                        <? endif; ?>
                        <div class='img_wrap'>
                            <div class='image'>
                                <img src="<?= $image_source; ?>" alt="<?= $image["alt"]; ?>" />
                            </div>
                            <? if($capacity) : ?>
                                <div class='capacity'>
                                    <h4 class="<?= $color; ?>">capacity</h4>
                                    <? foreach ($capacity as $room) :
                                        $location = $room['location'];
                                        $size = $room['size'];
                                        echo "<div>";
                                        if($location) {
                                            echo "<span class='h6'>$location</span>";
                                        }
                                        if($size) {
                                            echo "<p class='small'>$size</p>";
                                        }
                                        echo "</div>";
                                    endforeach; ?>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class='bottom_content'>
                        <? if($description) : ?>
                            <p class='description small'><?= $description; ?></p>
                        <? endif; ?>
                        <? if($contact_phone_number || $contact_email_address || $contact_name) : ?>
                            <div class='contact'>
                                <h4 class="<?= $color; ?>">contact</h4>
                                <div class='contact_content'>
                                    <? if($contact_name) : ?>
                                        <h5 class="h6"><?= $contact_name ?></h5>
                                    <? endif; ?>
                                    <? if($contact_phone_number) : ?>
                                        <a href="tel:<?= $contact_phone_number; ?>"><?= $contact_phone_number ?></a>
                                    <? endif; ?>
                                    <? if($contact_email_address) : ?>
                                        <a class='email' href="mailto:<?= $contact_email_address; ?>"><?= $contact_email_address ?></a>
                                    <? endif; ?>
                                </div>
                            </div>
                        <? endif; ?>
                        <? if($more_information_button["url"] || $more_information_button["wordpress_content"]) :
                            fm_button(
                                "More Information", 
                                'secondary', 
                                $more_information_button["open_in_a_new_tab"], 
                                $more_information_button["url_type"],
                                $more_information_button["url"],
                                $more_information_button["wordpress_content"]
                            );
                        endif; ?>
                    </div>
                </div>
                <?= $headline ? "<h2>$headline</h2>" : null; ?>
            </div>
        <? if($count == 2){$count = 0;} else {$count++;} endforeach; ?>
    </div>
<? }}