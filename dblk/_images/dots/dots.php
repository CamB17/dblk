<?
function get_dots_svg($orientation = '3x3', $size = 'lg', $color = null, $location = null) {
    // Locations can be one of the following:
    // bottom right, bottom left, top right, top left
    
    // exit if missing params
    if(!$orientation || !$size) {
        return null;
    }
    
    $dot_color = "";
    // set the correct svg dot color based on theme color passed through
    switch ($color) {
        case 'marigold':
            $dot_color = "#F2A53F";
        break;
        case 'greige':
            $dot_color = "#81746E";
        break;
        case 'burnt_umber':
            $dot_color = "#BC5E00";
        break;
        case 'tan':
            $dot_color = "#F2EDEB";
        break;
        case 'cotton_candy':
            $dot_color = "#F0AE84";
        break;
        case 'mint':
            $dot_color = "#C4DBCB";
        break;
        case 'marigold':
            $dot_color = "#F2A53F";
        break;
        case 'red':
            $dot_color = "#DF2F30";
        break;
        case 'teal':
            $dot_color = "#0B856F";
        break;
        case 'blue':
            $dot_color = "#030A56";
        break;
    }
    $dots_html = "";
    // switch containing all dot svg files
    switch ($size) {
        case 'lg':
            if($orientation == "3x3") {
                $dots_html = "<svg width='160px' height='160px' viewBox='0 0 160 160' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Page-Builder:-Singles-&amp;-Posts' transform='translate(-120.000000, -6183.000000)' fill='$dot_color'>
                            <g id='Highlight' transform='translate(120.000000, 5204.954545)'>
                                <g id='Corner-Dots' transform='translate(80.000000, 1058.045455) rotate(90.000000) translate(-80.000000, -1058.045455) translate(0.000000, 978.045455)'>
                                    <circle id='Oval' cx='20' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-7' cx='20' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-16' cx='140' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-17' cx='80' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-4' cx='80' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-8' cx='80' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-5' cx='140' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-9' cx='140' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-6' cx='20' cy='20' r='20'></circle>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "4x3") {
                $dots_html = "<svg width='220px' height='160px' viewBox='0 0 220 160' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Page-Builder:-Unique-Modules' transform='translate(-610.000000, -2301.000000)' fill='$dot_color'>
                            <g id='Split-Screen-Layout-2' transform='translate(0.000000, 1939.000000)'>
                                <g id='Corner-Dots' transform='translate(610.000000, 362.000000)'>
                                    <circle id='Oval' cx='80' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-7' cx='80' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-11' cx='20' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-16' cx='200' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-12' cx='20' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-17' cx='140' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-4' cx='140' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-8' cx='140' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-5' cx='200' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-9' cx='200' cy='140' r='20'></circle>
                                    <circle id='Oval-Copy-6' cx='80' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-10' cx='20' cy='20' r='20'></circle>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "6x2") {
                $dots_html = "<svg width='340px' height='100px' viewBox='0 0 340 100' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Home-Page-R1' transform='translate(-120.000000, -2172.000000)' fill='$dot_color'>
                            <g id='Eat-Shop-Stay' transform='translate(0.000000, 1067.000000)'>
                                <g id='Corner-Dots' transform='translate(120.000000, 1105.000000)'>
                                    <circle id='Oval' cx='140' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-7' cx='140' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-11' cx='80' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-16' cx='20' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-12' cx='80' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-17' cx='20' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-4' cx='200' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-8' cx='200' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-5' cx='260' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-9' cx='260' cy='80' r='20'></circle>
                                    <circle id='Oval-Copy-6' cx='320' cy='20' r='20'></circle>
                                    <circle id='Oval-Copy-10' cx='320' cy='80' r='20'></circle>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "4x4") {
                if($location == "bottom right") {
                    $dots_html = "<svg width='220px' height='220px' viewBox='0 0 220 220' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <title>Corner Dots</title>
                        <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                            <g id='Home-Page-R1' transform='translate(-1210.000000, -6386.000000)' fill='$dot_color'>
                                <g id='Footer' transform='translate(0.000000, 6059.000000)'>
                                    <g id='Corner-Dots' transform='translate(1320.000000, 437.000000) rotate(-90.000000) translate(-1320.000000, -437.000000) translate(1210.000000, 327.000000)'>
                                        <circle id='Oval' cx='80' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-7' cx='80' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-11' cx='20' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-12' cx='20' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-13' cx='20' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-14' cx='20' cy='20' r='20'></circle>
                                        <circle id='Oval-Copy-4' cx='140' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-8' cx='140' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-5' cx='200' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-9' cx='200' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy' cx='80' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-2' cx='80' cy='20' r='20'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>";
                }
            }
            if($orientation == "5x5") {
                if($location == "bottom left") {
                    $dots_html = "<svg width='280px' height='280px' viewBox='0 0 280 280' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <title>Corner Dots</title>
                        <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                            <g id='Page-Builder:-Singles-&amp;-Posts' transform='translate(0.000000, -4784.000000)' fill='$dot_color'>
                                <g id='Spotted' transform='translate(0.000000, 4182.000000)'>
                                    <g id='Corner-Dots' transform='translate(0.000000, 602.000000)'>
                                        <circle id='Oval' cx='80' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-7' cx='80' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-11' cx='20' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-12' cx='20' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-13' cx='20' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-14' cx='20' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-15' cx='20' cy='20' r='20'></circle>
                                        <circle id='Oval-Copy-4' cx='140' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-8' cx='140' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-5' cx='200' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-9' cx='200' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-6' cx='260' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-10' cx='260' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy' cx='80' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-2' cx='80' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-3' cx='80' cy='20' r='20'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>";
                }
                if($location == "top right") {
                    $dots_html = "<svg width='280px' height='280px' viewBox='0 0 280 280' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <title>Corner Dots</title>
                        <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                            <g id='Page-Builder:-Global' transform='translate(-1140.000000, -3759.000000)' fill='$dot_color'>
                                <g id='Subpage-Header' transform='translate(0.000000, 3317.000000)'>
                                    <g id='Corner-Dots' transform='translate(1280.000000, 582.000000) rotate(180.000000) translate(-1280.000000, -582.000000) translate(1140.000000, 442.000000)'>
                                        <circle id='Oval' cx='80' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-7' cx='80' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-11' cx='20' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-12' cx='20' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-13' cx='20' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-14' cx='20' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-15' cx='20' cy='20' r='20'></circle>
                                        <circle id='Oval-Copy-4' cx='140' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-8' cx='140' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-5' cx='200' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-9' cx='200' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy-6' cx='260' cy='200' r='20'></circle>
                                        <circle id='Oval-Copy-10' cx='260' cy='260' r='20'></circle>
                                        <circle id='Oval-Copy' cx='80' cy='140' r='20'></circle>
                                        <circle id='Oval-Copy-2' cx='80' cy='80' r='20'></circle>
                                        <circle id='Oval-Copy-3' cx='80' cy='20' r='20'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>";
                }
            }
        break;
        case 'sm':
            if($orientation == "3x3") {
                $dots_html = "<svg width='80px' height='80px' viewBox='0 0 80 80' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Home-Page-R1' transform='translate(-1265.000000, -1647.000000)' fill='$dot_color'>
                            <g id='Eat-Shop-Stay' transform='translate(0.000000, 1067.000000)'>
                                <g id='Tile-Copy-2' transform='translate(936.000000, 436.000000)'>
                                    <g id='Corner-Dots' transform='translate(369.000000, 184.000000) rotate(-90.000000) translate(-369.000000, -184.000000) translate(329.000000, 144.000000)'>
                                        <circle id='Oval' cx='40' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-7' cx='40' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-11' cx='10' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-12' cx='10' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-13' cx='10' cy='10' r='10'></circle>
                                        <circle id='Oval-Copy-4' cx='70' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-8' cx='70' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy' cx='40' cy='10' r='10'></circle>
                                        <circle id='Oval-Copy-2' cx='70' cy='10' r='10'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "2x5") {
                $dots_html = "<svg width='50px' height='140px' viewBox='0 0 50 140' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots Copy</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Home-Page-R1' transform='translate(-852.000000, -1542.000000)' fill='$dot_color'>
                            <g id='Eat-Shop-Stay' transform='translate(0.000000, 1067.000000)'>
                                <g id='Tile-Copy' transform='translate(528.000000, 436.000000)'>
                                    <g id='Corner-Dots-Copy' transform='translate(324.000000, 39.000000)'>
                                        <circle id='Oval' cx='40' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-7' cx='40' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy-11' cx='10' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy-12' cx='10' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-13' cx='10' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-14' cx='10' cy='10' r='10'></circle>
                                        <circle id='Oval-Copy-8' cx='10' cy='130' r='10'></circle>
                                        <circle id='Oval-Copy-9' cx='40' cy='130' r='10'></circle>
                                        <circle id='Oval-Copy' cx='40' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-2' cx='40' cy='10' r='10'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "5x2") {
                $dots_html = "<svg width='140px' height='50px' viewBox='0 0 140 50' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Page-Builder:-Unique-Modules' transform='translate(-1266.000000, -6918.000000)' fill='$dot_color'>
                            <g id='Tile-Copy-3' transform='translate(1086.000000, 6651.000000)'>
                                <g id='Corner-Dots' transform='translate(180.000000, 267.000000)'>
                                    <circle id='Oval' cx='70' cy='10' r='10'></circle>
                                    <circle id='Oval-Copy-7' cx='70' cy='40' r='10'></circle>
                                    <circle id='Oval-Copy-11' cx='40' cy='40' r='10'></circle>
                                    <circle id='Oval-Copy-12' cx='40' cy='10' r='10'></circle>
                                    <circle id='Oval-Copy-13' cx='10' cy='40' r='10'></circle>
                                    <circle id='Oval-Copy-14' cx='10' cy='10' r='10'></circle>
                                    <circle id='Oval-Copy-4' cx='100' cy='10' r='10'></circle>
                                    <circle id='Oval-Copy-8' cx='100' cy='40' r='10'></circle>
                                    <circle id='Oval-Copy-5' cx='130' cy='10' r='10'></circle>
                                    <circle id='Oval-Copy-9' cx='130' cy='40' r='10'></circle>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
            if($orientation == "4x4") {
                if($location == "top left") {
                    $dots_html = "<svg width='110px' height='110px' viewBox='0 0 110 110' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <title>Corner Dots</title>
                        <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                            <g id='Page-Builder:-Unique-Modules' transform='translate(-50.000000, -6190.000000)' fill='$dot_color'>
                                <g id='Logo-Grid' transform='translate(50.000000, 6190.000000)'>
                                    <g id='Corner-Dots' transform='translate(55.000000, 55.000000) rotate(90.000000) translate(-55.000000, -55.000000) '>
                                        <circle id='Oval' cx='40' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-7' cx='40' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy-11' cx='10' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy-12' cx='10' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-13' cx='10' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-14' cx='10' cy='10' r='10'></circle>
                                        <circle id='Oval-Copy-4' cx='70' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-8' cx='70' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy-5' cx='100' cy='70' r='10'></circle>
                                        <circle id='Oval-Copy-9' cx='100' cy='100' r='10'></circle>
                                        <circle id='Oval-Copy' cx='40' cy='40' r='10'></circle>
                                        <circle id='Oval-Copy-2' cx='40' cy='10' r='10'></circle>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>";
                }
                if($location == "bottom left") {
                    $dots_html = "<svg width='110px' height='110px' viewBox='0 0 110 110' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                        <title>Corner Dots</title>
                        <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                            <g id='Home-Page-R1' transform='translate(-95.000000, -1687.000000)' fill='$dot_color'>
                                <g id='Eat-Shop-Stay' transform='translate(0.000000, 1067.000000)'>
                                    <g id='Tile' transform='translate(95.000000, 436.000000)'>
                                        <g id='Corner-Dots' transform='translate(0.000000, 184.000000)'>
                                            <circle id='Oval' cx='40' cy='70' r='10'></circle>
                                            <circle id='Oval-Copy-7' cx='40' cy='100' r='10'></circle>
                                            <circle id='Oval-Copy-11' cx='10' cy='100' r='10'></circle>
                                            <circle id='Oval-Copy-12' cx='10' cy='70' r='10'></circle>
                                            <circle id='Oval-Copy-13' cx='10' cy='40' r='10'></circle>
                                            <circle id='Oval-Copy-14' cx='10' cy='10' r='10'></circle>
                                            <circle id='Oval-Copy-4' cx='70' cy='70' r='10'></circle>
                                            <circle id='Oval-Copy-8' cx='70' cy='100' r='10'></circle>
                                            <circle id='Oval-Copy-5' cx='100' cy='70' r='10'></circle>
                                            <circle id='Oval-Copy-9' cx='100' cy='100' r='10'></circle>
                                            <circle id='Oval-Copy' cx='40' cy='40' r='10'></circle>
                                            <circle id='Oval-Copy-2' cx='40' cy='10' r='10'></circle>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>";
                }
            }
        break;
        case 'xs':
            if($orientation == "3x3") {
                $dots_html = "<svg width='40px' height='40px' viewBox='0 0 40 40' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <title>Corner Dots</title>
                    <g id='Desktop-Designs' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>
                        <g id='Home-Page-R1' transform='translate(-342.000000, -3422.000000)' fill='$dot_color'>
                            <g id='Happenings' transform='translate(-1.000000, 2412.000000)'>
                                <g id='Secondary-Events' transform='translate(0.000000, 846.000000)'>
                                    <g id='Date-Slider' transform='translate(325.000000, 0.000000)'>
                                        <g id='Corner-Dots' transform='translate(18.000000, 164.000000)'>
                                            <circle id='Oval' cx='35' cy='5' r='5'></circle>
                                            <circle id='Oval-Copy-7' cx='35' cy='20' r='5'></circle>
                                            <circle id='Oval-Copy-11' cx='20' cy='20' r='5'></circle>
                                            <circle id='Oval-Copy-16' cx='5' cy='20' r='5'></circle>
                                            <circle id='Oval-Copy-12' cx='20' cy='5' r='5'></circle>
                                            <circle id='Oval-Copy-17' cx='5' cy='5' r='5'></circle>
                                            <circle id='Oval-Copy-8' cx='5' cy='35' r='5'></circle>
                                            <circle id='Oval-Copy-9' cx='20' cy='35' r='5'></circle>
                                            <circle id='Oval-Copy-10' cx='35' cy='35' r='5'></circle>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>";
            }
        break;
    }
    return $dots_html;
}