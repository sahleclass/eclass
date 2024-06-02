<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{{ $courses->title }}</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1 user-scalable=no" />
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<link rel="stylesheet" type="text/css"  href="{{url('content/global.css')}}"/>
		<script src="{{ url('js/FWDSI.js') }}"></script> <!-- player js -->
		<?php
	    	$psetting = App\PlayerSetting::first();
		?>
		
		<script src="{{url('js/FWDUVPlayer.js')}}"></script>
		
    <style>
		
		.fwduvp-subtitle 
		{
		    
			font:600 {{$psetting->subtitle_font_size ?? ''}}px Roboto, Arial !important;
			text-align: center !important;
			color: {{$psetting->subtitle_color ?? ''}} !important;
			text-shadow: 0px 0px 1px #000000 !important;
			line-height: 24px !important;
			margin: 0 20px 20px !important;
			padding: 0px !important;
		}
		.cboxOverlay{
			visibility: hidden;
		}
		
	</style>
		<script type="text/javascript">
			$(document).ready(function(){
			 	var SITEURL = '{{URL::to('')}}';
			 	 setInterval(function(){
			 		
			 		var tt = FWDUVPlayer.instaces_ar.length;
			 		@foreach($courses->chapter as $chapterr)
						@foreach($chapterr->courseclass as $cc)
							var movie_id='{{$cc->id}}';
						@endforeach
					@endforeach

					var user_id='{{Auth::user()->id}}'
					var video;
					
                  
					for(var i=0; i<tt; i++){
						video = FWDUVPlayer.instaces_ar[i];


						 $.ajax({
			            type: "get",
			            url: SITEURL + "/user/movie/time/"+video['curTime']+'/'+movie_id+'/'+user_id,
			            success: function (data) {
			             console.log(data);
			            },
			            error: function (data) {
			               console.log(data)
			            }
			        });
					}

			 		 
			 	},1000);
		         
			
		  });
		</script>

		

		<!-- Setup video player-->
		<script type="text/javascript">
			FWDUVPUtils.onReady(function(){
				
				new FWDUVPlayer({		
					//main settings
					instanceName:"player1",
					parentId:"myDiv",
					playlistsId:"courseplaylist",
					mainFolderPath:"{{url('content')}}",
					skinPath:"minimal_skin_dark",
					displayType:"fullscreen",
					initializeOnlyWhenVisible:"no",
					useVectorIcons:"yes",
					fillEntireVideoScreen:"no",
					fillEntireposterScreen:"yes",
					goFullScreenOnButtonPlay:"no",
					playsinline:"yes",
					privateVideoPassword:"428c841430ea18a70f7b06525d4b748a",
					youtubeAPIKey:"",
					useHEXColorsForSkin:"no",
					normalHEXButtonsColor:"#FF0000",
					useDeepLinking:"yes",
					googleAnalyticsMeasurementId:"G-842HPC3W6L",
					useResumeOnPlay:"no",
					showPreloader:"yes",
					preloaderBackgroundColor:"#000000",
					preloaderFillColor:"#FFFFFF",
					addKeyboardSupport:"yes",
					autoScale:"yes",
					showButtonsToolTip:"yes", 
					stopVideoWhenPlayComplete:"no",
					playAfterVideoStop:"no",
					@if(optional($psetting)->autoplay ==1)
					autoPlay:"yes",
					@else
					autoPlay:"no",
					@endif
					autoPlayText:"Click To Unmute",
					loop:"no",
					shuffle:"no",
					showErrorInfo:"yes",
					maxWidth:980,
					maxHeight:552,
					buttonsToolTipHideDelay:1.5,
					volume:.03,
					rewindTime:10,
					backgroundColor:"#000000",
					videoBackgroundColor:"#000000",
					posterBackgroundColor:"#000000",
					buttonsToolTipFontColor:"#5a5a5a",
					//logo settings
					@if(optional($psetting)->logo_enable ==1)
					showLogo:"yes",
					@else
					showLogo:"no",
					@endif
					logoPath:"",
					hideLogoWithController:"yes",
					logoPosition:"topRight",
					logoLink:"{{ config('app.url') }}",
					logoTarget: '_blank',
					logoPath:"",
					logoMargins:10,
					//playlists/categories settings
					showPlaylistsSearchInput:"yes",
					usePlaylistsSelectBox:"yes",
					showPlaylistsButtonAndPlaylists:"yes",
					showPlaylistsByDefault:"no",
					thumbnailSelectedType:"opacity",
					startAtPlaylist:0,
					buttonsMargins:15,
					thumbnailMaxWidth:350, 
					thumbnailMaxHeight:350,
					horizontalSpaceBetweenThumbnails:40,
					verticalSpaceBetweenThumbnails:40,
					inputBackgroundColor:"#333333",
					inputColor:"#999999",
					//playlist settings
					showPlaylistButtonAndPlaylist:"yes",
					playlistPosition:"right",
					showPlaylistByDefault:"yes",
					showPlaylistName:"yes",
					showSearchInput:"yes",
					showLoopButton:"yes",
					showShuffleButton:"yes",
					showPlaylistOnFullScreen:"no",
					showNextAndPrevButtons:"yes",
					showThumbnail:"yes",
					showOnlyThumbnail:"no",
					forceDisableDownloadButtonForFolder:"yes",
					addMouseWheelSupport:"yes", 
					startAtRandomVideo:"no",
					stopAfterLastVideoHasPlayed:"no",
					addScrollOnMouseMove:"no",
					randomizePlaylist:'no',
					folderVideoLabel:"VIDEO ",
					playlistRightWidth:310,
					playlistBottomHeight:380,
					startAtVideo:0,
					maxPlaylistItems:50,
					thumbnailWidth:71,
					thumbnailHeight:71,
					spaceBetweenControllerAndPlaylist:1,
					spaceBetweenThumbnails:1,
					scrollbarOffestWidth:8,
					scollbarSpeedSensitivity:.5,
					playlistBackgroundColor:"#000000",
					playlistNameColor:"#FFFFFF",
					thumbnailNormalBackgroundColor:"#1b1b1b",
					thumbnailHoverBackgroundColor:"#313131",
					thumbnailDisabledBackgroundColor:"#272727",
					searchInputBackgroundColor:"#000000",
					searchInputColor:"#999999",
					youtubeAndFolderVideoTitleColor:"#FFFFFF",
					folderAudioSecondTitleColor:"#999999",
					youtubeOwnerColor:"#888888",
					youtubeDescriptionColor:"#888888",
					mainSelectorBackgroundSelectedColor:"#FFFFFF",
					mainSelectorTextNormalColor:"#FFFFFF",
					mainSelectorTextSelectedColor:"#000000",
					mainButtonBackgroundNormalColor:"#212021",
					mainButtonBackgroundSelectedColor:"#FFFFFF",
					mainButtonTextNormalColor:"#FFFFFF",
					mainButtonTextSelectedColor:"#000000",
					//controller settings
					showController:"yes",
					showControllerWhenVideoIsStopped:"yes",
					showNextAndPrevButtonsInController:"no",
					showRewindButton:"yes",
					showPlaybackRateButton:"yes",
					showVolumeButton:"yes",
					showTime:"yes",
					showAudioTracksButton:"yes",
					showQualityButton:"yes",
					showInfoButton:"yes",
					@if(optional($psetting)->download ==1)
					showDownloadButton:"yes",
					@else
					showDownloadButton:"no",
					@endif
					
					@if(optional($psetting)->share_enable ==1)
					showShareButton:"yes",
					@else
					showShareButton:"no",
					@endif
					showEmbedButton:"yes",
					showChromecastButton:"yes",
					show360DegreeVideoVrButton:"yes",
					showFullScreenButton:"yes",
					disableVideoScrubber:"no",
					showScrubberWhenControllerIsHidden:"yes",
					showMainScrubberToolTipLabel:"yes",
					showDefaultControllerForVimeo:"yes",
					repeatBackground:"yes",
					controllerHeight:42,
					controllerHideDelay:3,
					startSpaceBetweenButtons:7,
					spaceBetweenButtons:8,
					scrubbersOffsetWidth:2,
					mainScrubberOffestTop:14,
					timeOffsetLeftWidth:5,
					timeOffsetRightWidth:3,
					timeOffsetTop:0,
					volumeScrubberHeight:80,
					volumeScrubberOfsetHeight:12,
					timeColor:"#888888",
					showYoutubeRelAndInfo:"no",
					youtubeQualityButtonNormalColor:"#888888",
					youtubeQualityButtonSelectedColor:"#FFFFFF",
					scrubbersToolTipLabelBackgroundColor:"#FFFFFF",
					scrubbersToolTipLabelFontColor:"#5a5a5a",
					//advertisement on pause window
					aopwTitle:"Advertisement",
					aopwWidth:400,
					aopwHeight:240,
					aopwBorderSize:6,
					aopwTitleColor:"#FFFFFF",
					//subtitle
					subtitlesOffLabel:"Subtitle off",
					//popup add windows
					showPopupAdsCloseButton:"yes",
					//embed window and info window
					embedAndInfoWindowCloseButtonMargins:15,
					borderColor:"#333333",
					mainLabelsColor:"#FFFFFF",
					secondaryLabelsColor:"#a1a1a1",
					shareAndEmbedTextColor:"#5a5a5a",
					inputBackgroundColor:"#000000",
					inputColor:"#FFFFFF",
					//login
		            playIfLoggedIn:"no",
		            playIfLoggedInMessage:"Please <a href='https://google.com' target='_blank'>login</a> to play this video.",
					//audio visualizer
					audioVisualizerLinesColor:"#0099FF",
					audioVisualizerCircleColor:"#FFFFFF",
					//lightbox settings
					closeLightBoxWhenPlayComplete:"no",
					lightBoxBackgroundOpacity:.6,
					lightBoxBackgroundColor:"#000000",
					//sticky on scroll
					stickyOnScroll:"no",
					stickyOnScrollShowOpener:"yes",
					stickyOnScrollWidth:"700",
					stickyOnScrollHeight:"394",
					//sticky display settings
					showOpener:"yes",
					showOpenerPlayPauseButton:"yes",
					verticalPosition:"bottom",
					horizontalPosition:"center",
					showPlayerByDefault:"yes",
					animatePlayer:"yes",
					openerAlignment:"right",
					mainBackgroundImagePath:"content/minimal_skin_dark/main-background.png",
					openerEqulizerOffsetTop:-1,
					openerEqulizerOffsetLeft:3,
					offsetX:0,
					offsetY:0,
					//playback rate / speed
					defaultPlaybackRate:1, //0.25, 0.5, 1, 1.25, 1.2, 2
					//cuepoints
					executeCuepointsOnlyOnce:"no",
					//annotations
					showAnnotationsPositionTool:"no",
					//ads
					openNewPageAtTheEndOfTheAds:"no",
					playAdsOnlyOnce:"no",
					adsButtonsPosition:"right",
					skipToVideoText:"You can skip to video in: ",
					skipToVideoButtonText:"Skip Ad",
					adsTextNormalColor:"#888888",
					adsTextSelectedColor:"#FFFFFF",
					adsBorderNormalColor:"#666666",
					adsBorderSelectedColor:"#FFFFFF",
					//a to b loop
					useAToB:"yes",
					atbTimeBackgroundColor:"transparent",
					atbTimeTextColorNormal:"#888888",
					atbTimeTextColorSelected:"#FFFFFF",
					atbButtonTextNormalColor:"#888888",
					atbButtonTextSelectedColor:"#FFFFFF",
					atbButtonBackgroundNormalColor:"#FFFFFF",
					atbButtonBackgroundSelectedColor:"#000000",
					//thumbnails preview
					thumbnailsPreviewWidth:196,
					thumbnailsPreviewHeight:200,
					thumbnailsPreviewBackgroundColor:"#000000",
					thumbnailsPreviewBorderColor:"#666",
					thumbnailsPreviewLabelBackgroundColor:"#666",
					thumbnailsPreviewLabelFontColor:"#FFF",
					// context menu
					showContextmenu:'yes',
					showScriptDeveloper:"yes",
					contextMenuBackgroundColor:"#1f1f1f",
					contextMenuBorderColor:"#1f1f1f",
					contextMenuSpacerColor:"#333",
					contextMenuItemNormalColor:"#888888",
					contextMenuItemSelectedColor:"#FFFFFF",
					contextMenuItemDisabledColor:"#444",
					// fingerprint stamp
					useFingerPrintStamp:"yes",
					frequencyOfFingerPrintStamp:3000,
					durationOfFingerPrintStamp:100
				});
			});

			var lightboxIntervalId;
			//openLightboxWhenPageReady();
			function openLightboxWhenPageReady(){
				clearInterval(lightboxIntervalId);
				if(window["player1"]){
					window["player1"].showLightbox();
				}else{
					lightboxIntervalId = setInterval(openLightboxWhenPageReady, 100);
				}
			};
			
			//Register API (an setInterval is required because the player is not available until the youtube API is loaded).
			var registerAPIInterval;
			function registerAPI(){
				clearInterval(registerAPIInterval);
				if(window.player1){
					player1.addListener(FWDUVPlayer.READY, readyHandler);
					player1.addListener(FWDUVPlayer.ERROR, errorHandler);
					player1.addListener(FWDUVPlayer.PLAY, playHandler);
					player1.addListener(FWDUVPlayer.PAUSE, pauseHandler);
					player1.addListener(FWDUVPlayer.STOP, stopHandler);
					player1.addListener(FWDUVPlayer.UPDATE, updateHandler);
					player1.addListener(FWDUVPlayer.UPDATE_TIME, updateTimeHandler);
					player1.addListener(FWDUVPlayer.UPDATE_VIDEO_SOURCE, updateVideoSourceHandler);
					player1.addListener(FWDUVPlayer.UPDATE_POSTER_SOURCE, updatePosterSourceHandler);
					player1.addListener(FWDUVPlayer.START_TO_LOAD_PLAYLIST, startToLoadPlaylistHandler);
					player1.addListener(FWDUVPlayer.LOAD_PLAYLIST_COMPLETE, loadPlaylistCompleteHandler);
					player1.addListener(FWDUVPlayer.PLAY_COMPLETE, playCompleteHandler);
					player1.addListener(FWDUVPlayer.SAFE_TO_SCRUB, safeToScrubb);
				}else{
					registerAPIInterval = setInterval(registerAPI, 100);
				}
			};

			//API event listeners examples
			function readyHandler(e){
				//console.log("API -- ready to use");
			}
			
			function errorHandler(e){
				console.log(e.error);
			}

			function playHandler(e){
				//console.log("API -- play");
			}

			function pauseHandler(e){
				//console.log("API -- pause");
			}

			function stopHandler(e){
				//console.log("API -- stop");
			}
			
			function updateHandler(e){
				//console.log("API -- update video, percent played: " + e.percent);
			}
			
			function updateTimeHandler(e){
				//console.log("API -- update time: " + e.currentTime + "/" + e.totalTime);
			}

			function updateVideoSourceHandler(e){
				//console.log("API -- video source update: " + player1.getVideoSource());
			}

			function updatePosterSourceHandler(e){
				//console.log("API -- video source update: " + player1.getPosterSource());
			}
			
			function startToLoadPlaylistHandler(e){
				//console.log("API -- start to load playlist: " + player1.getCurCatId());
			}
			
			function loadPlaylistCompleteHandler(e){
				//console.log("API -- playlist load complete: " + player1.getCurCatId());
			}
			
			function playCompleteHandler(e){
				//console.log("API -- play complete");
			}
			

			//API methods examples
			function play(){
				player1.play();
			}

			function playNext(){
				player1.playNext();
			}

			function playPrev(){
				player1.playPrev();
			}

			function playShuffle(){
				player1.playShuffle();
			}
			
			function pause(){
				player1.pause();
			}

			function stop(){
				player1.stop();
			}

			function scrub(percent){
				player1.scrub(percent);
			}

			function setVolume(percent){
				player1.setVolume(percent);
			}
			
			function share(){
				player1.share();
			}
			
			function download(){
				player1.downloadVideo();
			}

			function goFullScreen(){
				player1.goFullScreen();
			}
			
			function loadThumbnailsPreview(){
				player1.setThumbnailPreviewSource('content/thumbnails.vtt');
			}
			
			function showPlaylist(){
				player1.hidePlaylist();
			}
			
			function hidePlaylist(){
				player1.showPlaylist();
			}
			
			function safeToScrubb(){
				//player1.scrubbAtTime("00:00:05")
			}

			function loadPlaylist(playlistId){
				player1.loadPlaylist(playlistId);
			}
			
			function getRandomColor() {
				var letters = '0123456789ABCDEF';
				var color = '#';
				for (var i = 0; i < 6; i++ ) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				return color;
			}
			
			function changeCanvasColors(){
				var randomColor = getRandomColor();
				player1.updateHEXColors(randomColor, "#FFFFFF");
				//$('.classicDarkThumbnailTitle').css('color',randomColor);
				
				$("head").append('<style type="text/css"></style>');
				var new_stylesheet = $("head").children(':last');
				new_stylesheet.html('.classicDarkThumbnailTitle, .minimialDarkBold, .fwdChangeColor{color:' + randomColor + ';}');
				
				$(".ytbChangeColor").css("color", randomColor);
			}
		</script>
		
		
		
	</head>

	<body class="player-course-chapter">
		<div id="myDiv" class="player-course-chapter-list"></div>
	
		<!--  Playlists -->
		<ul id="courseplaylist" class="display-none">

			@php
                $today = Carbon\Carbon::now();
            @endphp
			
			@foreach($courses->chapter->sortBy('id') as $chapter)

			@if(Auth::user()->role == "user" && $courses->drip_enable == 1 && $chapter->drip_type != NULL)

				@if($chapter->drip_type == 'date' && $chapter->drip_date != NULL)

					@if($today >= $chapter->drip_date)
					<li data-source="courseplaycontent{{ $chapter->id }}" data-playlist-name="{{ $chapter->chapter_name }}" data-thumbnail-path="{{ url('images/course/'.$courses->preview_image) }}">
						<p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title:')}} </span>{{ $chapter->chapter_name }}</p>
						<p class="fwduvp-categories-type"><span class="fwduvp-header">{{__('Category:')}} </span>{{ $courses->category->title }}</p>
						<p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $courses->short_detail }}</p>
					</li>
					@endif

				@elseif($chapter->drip_type == 'days' && $chapter->drip_days != NULL)

				@php
	                $order = App\Order::where('status', '1')->where('user_id', Auth::User()->id)->where('course_id', $courses->id)->first();
	                $days = $chapter->drip_days;

	                $orderDate = optional($order)['created_at'];


                    $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                    $course_id = array();

                    foreach($bundle as $b)
                    {
                       $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                        array_push($course_id, $bundle->course_id);
                    }

                    $course_id = array_values(array_filter($course_id));
                    $course_id = array_flatten($course_id);

                    if($orderDate != NULL){
                        $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                    }
                    elseif(isset($course_id) && in_array($courses->id, $course_id)){
                        $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                    }
           		@endphp

					@if($today >= $startDate)
					<li data-source="courseplaycontent{{ $chapter->id }}" data-playlist-name="{{ $chapter->chapter_name }}" data-thumbnail-path="{{ url('images/course/'.$courses->preview_image) }}">
						<p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title:')}} </span>{{ $chapter->chapter_name }}</p>
						<p class="fwduvp-categories-type"><span class="fwduvp-header">{{__('Category:')}} </span>{{ $courses->category->title }}</p>
						<p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $courses->short_detail }}</p>
					</li>
					@endif

				@endif
			@else

				<li data-source="courseplaycontent{{ $chapter->id }}" data-playlist-name="{{ $chapter->chapter_name }}" data-thumbnail-path="{{ url('images/course/'.$courses->preview_image) }}">
					<p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title:')}} </span>{{ $chapter->chapter_name }}</p>
					<p class="fwduvp-categories-type"><span class="fwduvp-header">{{__('Category:')}} </span>{{ $courses->category->title }}</p>
					<p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $courses->short_detail }}</p>
				</li>
			@endif


			@endforeach
		</ul>
		@foreach($courses->chapter as $chapter)
			<ul id="courseplaycontent{{ $chapter->id }}" class="display-none">
				@foreach($chapter->courseclass->sortBy('position') as $class)
					
					@php
						$myid =	$class->id;
						if($class->url != ''){

							if(strstr( $class->url, 'youtu')){
								$url = str_replace("https://youtu.be/", "https://youtube.com/watch?v=", $class->url.'?modestbranding=1');
							}else{
								$url = $class->url;
							}
							
							
						}elseif($class->video != ''){
							$url = url('video/class/'.$class->video);
						}
						elseif($class->aws_upload != ''){
							$url = $class->aws_upload;
						}
						elseif($class->audio != ''){
							$url = url('files/audio/'.$class->audio);
						}

					@endphp
					
  					@php

  						$pauseads = App\Ads::where('ad_location','=','onpause')->get();
						$pausead =  App\Ads::inRandomOrder()->where('ad_location','=','onpause')->first();
			        
						$endtime='0';
						$user_id=Auth::check() ? Auth::user()->id : $user;
						
						$movie_id = $class->id;

						$checkmovie=Session::get('time_'.$movie_id);
						if (!is_null($checkmovie)) {
							$mid=$checkmovie['movie'];
				      	if ($mid==$movie_id) {
				      	$endtime=$checkmovie['endtime'];
				      	}
				      	else{
				      		$endtime='00:00:00';
				      	}
						}
						else{
							$endtime='00:00:00';
						}
					
					@endphp

		@if(Auth::user()->role == "user" && $courses->drip_enable == 1 && $class->drip_type != NULL)
			@if($class->drip_type == 'date' && $class->drip_date != NULL)
				@if($today >= $class->drip_date)

					@if($class->type == 'video' && $class->iframe_url == NULL)
						@if($class->status == '1')
						<li
						@if($pauseads->count()>0)
							data-advertisement-on-pause-source="{{ asset('adv_upload/image/'.$pausead->ad_image)}}" 
						@endif 
						@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
							data-thumb-source="{{ url('images/course/'.$chapter->courses->preview_image) }}"
						@else
							data-thumb-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"
						@endif 

							data-video-source="{{ $url }}"

							data-start-at-time="{{date('H:i:s',strtotime($endtime))}}"
						
						@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
						    data-poster-source="{{ url('images/course/'.$chapter->courses->preview_image) }}" 
						@else
							data-poster-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"  
						@endif

						    data-subtitle-soruce="[
					  		@foreach($class->subtitle as $sub)
					  		{source:'{{ url('subtitles/'.$sub->sub_t) }}', label:'{{ $sub->sub_lang }}'},
					  		@endforeach
					  		]" data-start-at-subtitle="1" data-downloadable="yes"> 
					  		@php
								$skipads = App\Ads::where('ad_location','=', 'skip')->get();
								$skipad = App\Ads::inRandomOrder()->where('ad_location','=','skip')->first();

							@endphp
								@if($skipads->count()>0)
								<ul data-ads="">
									<li @if($skipad->ad_video !="no")

									data-source="{{ asset('adv_upload/video/'.$skipad->ad_video) }}" 
									@else
									data-source="{{ $skipad->ad_url }}" @endif data-time-start="{{ $skipad->time }}" data-time-to-hold-ads="{{ $skipad->ad_hold }}" data-thumbnail-source="{{asset('images/course/'.$chapter->courses->preview_image)}}" data-link="{{ $skipad->ad_target }}" data-target="_blank"></li>
									
								</ul>
								@endif

							    <div data-video-short-description="">
							    	 <p class="fwduvp-categories-title"><span class="fwduvp-header">Title: </span>{{ $class->title }}</p>
				        			 <p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $chapter->courses->short_detail }}</p>
							    </div>

							    @php
								$popupads = App\Ads::where('ad_location','=', 'popup')->get();
								$popupad = App\Ads::inRandomOrder()->where('ad_location','=','popup')->first();	
								@endphp

								@if($popupads->count()>0)
								<div data-add-popup="">
									<p data-image-path="{{ asset('adv_upload/image/'.$popupad->ad_image) }}" data-time-start="{{ $popupad->time }}" data-time-end="{{ $popupad->endtime }}" data-link="{{ $popupad->ad_target }}" data-target="_blank"></p>
								</div>
								@endif
						</li>
						@endif
					@endif
					
				@endif
			@elseif($class->drip_type == 'days' && $class->drip_days != NULL)

				@php
	                $order = App\Order::where('status', '1')->where('user_id', Auth::User()->id)->where('course_id', $courses->id)->first();
	                $days = $class->drip_days;
	                
	                $orderDate = optional($order)['created_at'];


                    $bundle = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', '!=', NULL)->get();

                    $course_id = array();

                    foreach($bundle as $b)
                    {
                       $bundle = App\BundleCourse::where('id', $b->bundle_id)->first();
                        array_push($course_id, $bundle->course_id);
                    }

                    $course_id = array_values(array_filter($course_id));
                    $course_id = array_flatten($course_id);

                    if($orderDate != NULL){
                        $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                    }
                    elseif(isset($course_id) && in_array($courses->id, $course_id)){
                        $startDate = date("Y-m-d", strtotime("$bundle->created_at +$days days"));
                    }
           		@endphp

           		@if($today >= $startDate)

           			@if($class->type == 'video' && $class->iframe_url == NULL)
						@if($class->status == '1')
						<li
						@if($pauseads->count()>0)
							data-advertisement-on-pause-source="{{ asset('adv_upload/image/'.$pausead->ad_image)}}" 
						@endif 
						@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
							data-thumb-source="{{ url('images/course/'.$chapter->courses->preview_image) }}"
						@else
							data-thumb-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"
						@endif 

							data-video-source="{{ $url }}"

							data-start-at-time="{{date('H:i:s',strtotime($endtime))}}"
						
						@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
						    data-poster-source="{{ url('images/course/'.$chapter->courses->preview_image) }}" 
						@else
							data-poster-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"  
						@endif

						    data-subtitle-soruce="[
					  		@foreach($class->subtitle as $sub)
					  		{source:'{{ url('subtitles/'.$sub->sub_t) }}', label:'{{ $sub->sub_lang }}'},
					  		@endforeach
					  		]" data-start-at-subtitle="1" data-downloadable="yes"> 
					  		@php
								$skipads = App\Ads::where('ad_location','=', 'skip')->get();
								$skipad = App\Ads::inRandomOrder()->where('ad_location','=','skip')->first();

							@endphp
								@if($skipads->count()>0)
								<ul data-ads="">
									<li @if($skipad->ad_video !="no")

									data-source="{{ asset('adv_upload/video/'.$skipad->ad_video) }}" 
									@else
									data-source="{{ $skipad->ad_url }}" @endif data-time-start="{{ $skipad->time }}" data-time-to-hold-ads="{{ $skipad->ad_hold }}" data-thumbnail-source="{{asset('images/course/'.$chapter->courses->preview_image)}}" data-link="{{ $skipad->ad_target }}" data-target="_blank"></li>
									
								</ul>
								@endif

							    <div data-video-short-description="">
							    	 <p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title: ')}}</span>{{ $class->title }}</p>
				        			 <p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $chapter->courses->short_detail }}</p>
							    </div>

							    @php
								$popupads = App\Ads::where('ad_location','=', 'popup')->get();
								$popupad = App\Ads::inRandomOrder()->where('ad_location','=','popup')->first();	
								@endphp

								@if($popupads->count()>0)
								<div data-add-popup="">
									<p data-image-path="{{ asset('adv_upload/image/'.$popupad->ad_image) }}" data-time-start="{{ $popupad->time }}" data-time-end="{{ $popupad->endtime }}" data-link="{{ $popupad->ad_target }}" data-target="_blank"></p>
								</div>
								@endif
						</li>
						@endif
					@endif


           		@endif

           	@endif


        @else

        	@if($class->type == 'video' && $class->iframe_url == NULL)
				@if($class->status == '1')
				<li
				@if($pauseads->count()>0)
					data-advertisement-on-pause-source="{{ asset('adv_upload/image/'.$pausead->ad_image)}}" 
				@endif 
				@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
					data-thumb-source="{{ url('images/course/'.$chapter->courses->preview_image) }}"
				@else
					data-thumb-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"
				@endif 

					data-video-source="{{ $url }}"

					data-start-at-time="{{date('H:i:s',strtotime($endtime))}}"
				
				@if($chapter->courses['preview_image'] !== NULL && $chapter->courses['preview_image'] !== '') 
				    data-poster-source="{{ url('images/course/'.$chapter->courses->preview_image) }}" 
				@else
					data-poster-source="{{ Avatar::create($chapter->courses->title)->toBase64() }}"  
				@endif

				    data-subtitle-soruce="[
			  		@foreach($class->subtitle as $sub)
			  		{source:'{{ url('subtitles/'.$sub->sub_t) }}', label:'{{ $sub->sub_lang }}'},
			  		@endforeach
			  		]" data-start-at-subtitle="1" data-downloadable="yes"> 
			  		@php
						$skipads = App\Ads::where('ad_location','=', 'skip')->get();
						$skipad = App\Ads::inRandomOrder()->where('ad_location','=','skip')->first();

					@endphp
						@if($skipads->count()>0)
						<ul data-ads="">
							<li @if($skipad->ad_video !="no")

							data-source="{{ asset('adv_upload/video/'.$skipad->ad_video) }}" 
							@else
							data-source="{{ $skipad->ad_url }}" @endif data-time-start="{{ $skipad->time }}" data-time-to-hold-ads="{{ $skipad->ad_hold }}" data-thumbnail-source="{{asset('images/course/'.$chapter->courses->preview_image)}}" data-link="{{ $skipad->ad_target }}" data-target="_blank"></li>
							
						</ul>
						@endif

					    <div data-video-short-description="">
					    	 <p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title:')}} </span>{{ $class->title }}</p>
		        			 <p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description:')}} </span>{{ $chapter->courses->short_detail }}</p>
					    </div>

					    @php
						$popupads = App\Ads::where('ad_location','=', 'popup')->get();
						$popupad = App\Ads::inRandomOrder()->where('ad_location','=','popup')->first();	
						@endphp

						@if($popupads->count()>0)
						<div data-add-popup="">
							<p data-image-path="{{ asset('adv_upload/image/'.$popupad->ad_image) }}" data-time-start="{{ $popupad->time }}" data-time-end="{{ $popupad->endtime }}" data-link="{{ $popupad->ad_target }}" data-target="_blank"></p>
						</div>
						@endif
				</li>
				@endif
			@endif

        @endif

					

					
				@endforeach
			</ul>
		@endforeach
	</body>
</html>



<style>
    .fwduvp {
	  color: #FFF !important;
	}
</style>
{{-- <?php
    $simple = '2';
    
?>
<script defer>
$( document ).ready(function() {
	setTimeout(function(){
		count = 0;
		// $(".fwduvp-playlist-thumbs-holder *").attr("disabled", true).off('click');
		// $(".fwduvp-playlist-thumbs-holder *").css({"pointer-events": "none"});
		$('.fwduvp-playlist-thumbs-holder *').children().each(function(eq, el) {
			$(this).attr("id",count);
			count = count+1;
    // el = $(el);
    // if(typeof(el.attr('id')) === "undefined") {
    //     el.attr('id', 'div-' + eq);
    // }
		});
		$('.fwduvp-playlist-thumbs-holder *').children().each(function(eq, el) {
			elId = $(this).attr('id');
			// console.log(elId);
			zz = "{{$simple}}";
			if(elId == zz){
				// $(this).css({"pointer-events": "true"});
			}else{
				$(this).css({"pointer-events": "none"});
			}
			
    // el = $(el);
    // if(typeof(el.attr('id')) === "undefined") {
    //     el.attr('id', 'div-' + eq);
    // }
		});
		// $(".fwduvp-playlist-thumbs-holder *").click(false);
		console.log('test');

	}
		, 3000);

    // $(".fwduvp-playlist-thumbs-holder").children().prop('disabled',true);
});
</script> --}}


