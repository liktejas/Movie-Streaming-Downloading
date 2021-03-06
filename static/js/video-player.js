var player = videojs('videoPlayer',{
	autoplay: false,
	controls: true,
	loop: true,
	playbackRates: [0.25, 0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3],
	plugins: {
		hotkeys: {
			enableModifiersForNumber: false,
			seekStep: 10
		}
	}
});