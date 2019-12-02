<?php get_header(); ?>

<main id="content" class="has-sidebar">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="page-header">
            <div class="page-header-featured_image">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            </div>
            <div class="page-header-info">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php include 'components/_breadcrumbs.php'; ?>
            </div>
        </header>    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <div class="modular-block">
                    <?php the_content(); ?>
                </div>
                <!-- Cost Calculator -->
                <style type="text/css">
                    /* Fix Divs from Main Form
                    ==================================================*/
                    form.costCompare {
                        width:100%;
                        margin-left:10px;
                        float:left;
                    }

                    @media only screen and (min-width: 768px) and (max-width: 959px) {
                        form.costCompare {
                            width:748px;
                        }
                    }

                    .costCompare fieldset div {
                        margin:0;
                        padding:2px;
                    }

                    .costCompare fieldset div label {
                        float: left;
                        line-height: 1.1;
                        margin: 7px 0 0 0;
                        width: 88%;
                        text-align:left;
                    }
	
                    .costCompare fieldset div label.costCompareInclude {
                        text-align:center;
                    }
	
                    .costCompare fieldset div input[type="text"], .costCompare fieldset div input[type="password"], .costCompare fieldset div input[type="email"], .costCompare fieldset div textarea, .costCompare fieldset div select {
                        width: 88%;
                        display: block;
                        background: #fff;
                    }

                    .costCompare fieldset div select {
                        width: 88%; 
                    }
                            
                    .costCompare fieldset div.controls {
                        text-align:center;
                        margin-right:2%;
                        padding-top: 15px;
                        padding-bottom: 15px;
                    }
                    /* End Fix Divs from Main Form
                    ==================================================*/

                    .costCompare fieldset div.compareOuter {
                        width:90%;
                        float:left;
                        margin-bottom:0;
                        margin-left:5%;
                    }

                    .compareLeftOuter {
                        width:67%;
                        float:left;
                    }

                    .compareRightOuter {
                        width:33%;
                        float:right;
                    }

                    .compareLeftInner {
                        width:50%;
                        float:left;
                    }

                    .compareRightInner {
                        width:50%;
                        float:right;
                    }

                    .compareSmall {
                        width:9%;
                        float:left;
                    }

                    .compareBig {
                        width:91%;
                        float:right;
                    }

                    /* #Misc
                    ================================================== */
                    .remove-bottom { margin-bottom: 0 !important; }
                    .half-bottom { margin-bottom: 10px !important; }
                    .add-bottom { margin-bottom: 20px !important; }
                    .add-padding {padding-bottom: 20px;}
                    .mobile {display:none;}
                    .add-top {margin-top:20px;}

                    .editor img {
                        max-width: 100%;
                        height: auto;
                    }
	
                    .alignRight {text-align:right;}
                </style>

                <script type="text/javascript">
                    function calculate() {
                        var sum = 0;
                        var num = 0;
                        
                        jQuery('.calcField').each(function() {
                            num = Number( jQuery(this).val() );
                            
                            if (isNaN(num)) {
                                var num = 0;
                                jQuery(this).val("?");
                            }
                            
                            sum += num;
                        });		
                                
                        jQuery('#totalField').val(sum.toFixed(2));		
                        
                        var superiorInput = Number( jQuery('#superiorInput').val() );
                        
                        jQuery('#superiorTotal').val(superiorInput.toFixed(2));
                        
                        if ( jQuery('#superiorTotal').val() == "NaN" ) {jQuery('#superiorTotal').val("?")}
                    }

                    jQuery(document).ready(function() {
                        jQuery('.calcField').blur(calculate);
                        
                        jQuery( "#superiorInput" ).focus(function() {
                            if( jQuery(this).val() == "Enter your estimate" ) {jQuery(this).val("")}
                        });
                        
                        jQuery('#superiorInput').blur(calculate);
                        
                        jQuery("#calculateButton").click(calculate);

                        jQuery( "#calculateButton" ).click(function( event ) {
                            event.preventDefault();
                            calculate();
                        });

                        jQuery( "#printButton" ).click(function( event ) {
                            event.preventDefault();
                            window.print();
                        });
                    });
                </script>

                <div class="modular-block">
                    <div class="row add-bottom">
                        <form action="#" method="post" id="costCompare" class="costCompare">
                            <fieldset>
                                <div class="row add-bottom"> 
                                    <div class="compareOuter">
                                        <div class="compareLeftOuter">
                                            <div class="compareLeftInner">
                                                <div class="compareSmall">
                                                    <label> </label>
                                                </div>
                                                <div class="compareBig">
                                                    <label class="costCompareInclude"><strong>Monthly Expenses</strong></label>
                                                </div>
                                            </div>
                                            <div class="compareRightInner">
                                                <div class="compareSmall">
                                                    <label> </label>
                                                </div>
                                                <div class="compareBig">
                                                    <label class="costCompareInclude"><strong>Staying at Home</strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="compareRightOuter">
                                            <div class="compareSmall">
                                                <label> </label>
                                            </div>
                                            <div class="compareBig">
                                                <label class="costCompareInclude"><strong><?php echo esc_html( get_bloginfo( 'name' ) ); ?></strong></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>1.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Mortgage Payment/Rent</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            <label>$</label>
                                        </div>
                                        <div class="compareBig">
                                            <input type="text" id="superiorInput" class="clearField" value="Enter your estimate">
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>2.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>House Maintenance</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>3.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Property Taxes</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>4.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Property Insurance</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>5.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>HOA Dues &amp; Assessments</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>6.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Lawn Care/Landscaping</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-15">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>8.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Security/Alarm System</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-17">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>9.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Electric/Gas</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>10.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Trash Removal</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-7">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>11.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Sewer &amp; Water</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>12.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Cable</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-9">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>13.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Internet/WiFi</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>14.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Car Payment/Lease</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-11">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>15.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Car Maintenance/Repairs</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-13">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>16.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Car Insurance</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-14">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>17.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Gasoline</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-14">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>18.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Emergency Call System</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-18">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>20.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Groceries</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-20">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label>21.</label>
                                            </div>
                                            <div class="compareBig">
                                                <label>Entertainment/Restaurants</label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" class="calcField" id="field-20">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <label class="costCompareInclude">Included</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="compareLeftOuter">
                                        <div class="compareLeftInner">
                                            <div class="compareSmall">
                                                <label> </label>
                                            </div>
                                            <div class="compareBig">
                                                <label><strong>TOTAL MONTHLY COST</strong></label>
                                            </div>
                                        </div>
                                        <div class="compareRightInner">
                                            <div class="compareSmall">
                                                <label>$</label>
                                            </div>
                                            <div class="compareBig">
                                                <input type="text" id="totalField">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="compareRightOuter">
                                        <div class="compareSmall">
                                            
                                        </div>
                                        <div class="compareBig">
                                            <input type="text" id="superiorTotal">
                                        </div>
                                    </div>
                                </div>
                                <div class="compareOuter">
                                    <div class="controls">
                                        <input id="clear-button" name="clear" type="reset" value="Clear" class="color-button black">
                                
                                        <input id="calculateButton" name="submit" type="submit" value="Calculate" class="theme-button"> &nbsp;
                                
                                        <!-- <input id="printButton" name="submit" type="submit" value="Print" class="button"/> -->
                                        </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- End Cost Calculator -->
            </div>
        </article>
        <!-- Sidebar -->
        <?php get_sidebar(); ?>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>