<div class="container">
    <div class="row">
        <div class="span3">
            {load_menu('left_menu')}
        </div>
        <div class="span6">
            <article>
                <h1>{echo encode($page.title)}</h1>
                                {$CI->load->module('print_data')->render_button(
                                                array(
                                                    'id'=>$page['id'],
                                                 ), 'page'
                                          )}

                <div class="text">
                    {if $page.id == 68 || $page.lang_alias == 68}
                        <div class="f_l map">
                            <img src="{$THEME}images/map.jpg" 
                                 alt="map"/>
                            {$page.full_text}
                        </div> 
                    {else:}
                        {$page.full_text}
                    {/if}
                </div>
                {$Comments = $CI->load->module('comments')->init($page)}

                <script type="text/javascript">
                    {literal}
                        $(function() {
                            renderPosts(this);
                        })
                    {/literal}
                </script>
                <div id="comment">
                    <div id="for_comments" name="for_comments"></div>
                </div>
            </article>
        </div>
    </div>
</div>