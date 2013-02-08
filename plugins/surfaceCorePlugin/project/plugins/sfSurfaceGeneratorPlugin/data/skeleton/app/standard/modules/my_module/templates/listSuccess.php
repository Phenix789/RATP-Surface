<div class="inner">
    <div class="section">
        <div class="title_wrapper title_wrapper_list">
            <h2>
                <a href="#" title="Lien permanent" target="_blank"><img alt="Permalink" src="/sfSurfaceGeneratorPlugin/images/theme/permalink.png"></a>
                ##APP_NAME## application created!!</h2>
        
         </div>
        <div id="sf_admin_header">

        </div>

        <div class="section_inner">
            <div class="gtab" id="sf_gtabdiv_container_business_filters_tg_center">
                <ul id="" class="gtab-controllers">
                    <li><a href="#sf_gtabdiv_advanced" id="sf_gtabdiv_advanced-controller" class="gtab-active">Recherche</a></li>			</ul>


                <div class="gtab-active" id="sf_gtabdiv_advanced">

                    <form action="" onsubmit="surface.form_to(this, 'my_module/list', 'tg_center', {asynchronous:true, evalScripts:true});; return false;" class="search_form general_form" method="get"><input type="hidden" value="tg_center" id="target" name="target">


                        <fieldset>
                            Next steps :

                            <ul>
                                <li>symfony surface-i18n-compile fr</li>
                                <li>symfony surface-i18n-deploy fr</li>
                                <li>Add a new menu item into /config/menu.yml for your main controller</li>
                                <li>surface-init-module ##APP_NAME## module Model</li>
                                <li></li>
                                <li></li>
                            </ul>
                        </fieldset>



                        <br style="clear:both">
                        <fieldset id="advanced_filters_button">
                            <div class="action_wrapper action_wrapper_filters">
                                <ul>
                                    <li>
                                        <input type="submit" style="position: absolute; width: 0px; height: 0px; top: -20000px" value="filter" name="filter"><span class="button"><a onclick="var a=(Element.extend(this)).ancestors();for(var i in a){if(a[i].tagName=='FORM'){try{a[i].onsubmit();} catch(err){a[i].submit();}break;}}; return false;" href="#" class="button_apply_filter">Rechercher</a></span>		</li>
                                    <li style="padding-left: 5px;">
                                        <span class="button "><a onclick="surface.link_to('my_module/list?filter=filter&amp;target=tg_center&amp;skipNav=true','tg_center', {});; return false;" href="#" class="button_showall_filter">Afficher tout</a></span>		</li>
                                </ul>
                            </div></fieldset>
                        <br style="clear: both;">
                    </form>				</div>
            </div>
        </div>
        
        <div id="my_module_list_tg_center">

        </div>


        <div class="export_wrapper">
            <ul>
                <li><span class="button"><a href="#" class="sf_admin_export_list_business sf_admin_export_xls">Exporter</a></span></li>
            </ul>
        </div>
        <div style="clear: both;" id="sf_admin_footer">
        </div>
    </div>
</div>