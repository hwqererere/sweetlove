<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div id="top">
 <div class="wrap">
  <!-- {if $open.user} -->
  <ul class="userTop">
   <!-- {if $user} --> 
   <a href="{$url.user}">{$user.user_name}，{$lang.user_welcom_top}</a><s></s><a href="{$url.logout}">{$lang.user_logout}</a> 
   <!-- {else} --> 
   <a href="{$url.login}">{$lang.user_login_nav}</a><s></s><a href="{$url.register}">{$lang.user_register_nav}</a> 
   <!-- {/if} --> 
  </ul>
  <!-- {/if} -->
  <ul class="topNav">
   <!-- {foreach from=$nav_top_list item=nav} --> 
   <!-- {if $nav.child} -->
   <li class="parent"><a href="{$nav.url}">{$nav.nav_name}<s></s></a>
    <ul>
     <!-- {foreach from=$nav.child item=child} -->
     <li><a href="{$child.url}">{$child.nav_name}</a></li>
     <!-- {/foreach} -->
    </ul>
   </li>
   <!-- {else} -->
   <li><a href="{$nav.url}"{if $nav.target} target="_blank"{/if}>{$nav.nav_name}</a><s></s></li>
   <!-- {/if} --> 
   <!-- {/foreach} -->
   <li><a href="javascript:AddFavorite('{$site.root_url}', '{$site.site_name}')">{$lang.add_favorite}</a></li>
  </ul>
 </div>
</div>
<div id="header">
 <div class="wrap clearfix">
  <ul class="logo">
   <a href="{$site.root_url}"><img src="../images/{$site.site_logo}" alt="{$site.site_name}" title="{$site.site_name}" /></a>
  </ul>
  <ul class="searchBox">
   <form name="search" id="search" method="get" action="{$site.root_url}">
    <label for="keyword">{$lang.search_cue}</label>
    <input name="s" type="text" class="keyword" title="{$lang.search_product_cue}" autocomplete="off" maxlength="128" value="{if $keyword}{$keyword|escape}{else}{$lang.search_product}{/if}" onclick="formClick(this,'{$lang.search_product}')">
    <input type="submit" class="btnSearch" value="{$lang.btn_submit}">
   </form>
  </ul>
 </div>
</div>
<div id="mainNav">
 <ul class="wrap">
  <li{if $index.cur} class="cur"{/if}><a href="{$site.root_url}" class="first">{$lang.home}</a></li>
  <!-- {foreach from=$nav_middle_list name=nav_middle_list item=nav} --> 
  <li{if $nav.cur} class="cur hover"{/if}><a href="{$nav.url}"{if $smarty.foreach.nav_middle_list.iteration eq 7} class="last"{/if}{if $nav.target} target="_blank"{/if}>{$nav.nav_name}</a> 
  <!-- {if $nav.child} -->
  <ul>
   <!-- {foreach from=$nav.child item=child} -->
   <li><a href="{$child.url}"{if $child.child} class="parent"{/if}>{$child.nav_name}</a> 
    <!-- {if $child.child} -->
    <ul>
     <!-- {foreach from=$child.child item=children} -->
     <li><a href="{$children.url}">{$children.nav_name}</a></li>
     <!-- {/foreach} -->
    </ul>
    <!-- {/if} --> 
   </li>
   <!-- {/foreach} -->
  </ul>
  <!-- {/if} -->
  </li>
  <!-- {/foreach} -->
  <div class="clear"></div>
 </ul>
</div>
