<x-layouts::app>
    <x-video
        mp4="https://cdn.videvo.net/videvo_files/video/premium/video0291/small_watermarked/_Retro51_preview.mp4"
        webm="https://cdn.videvo.net/videvo_files/video/premium/video0291/small_watermarked/_Retro51_preview.webm"
        poster="https://hatrabbits.com/wp-content/uploads/2017/01/random.jpg"
    />

    <x-image 
        src="https://hatrabbits.com/wp-content/uploads/2017/01/random.jpg"
        alt="random"
    />

    <x-image 
        src="/images/facebook.svg"
        alt="facebook"
    />

    <x-test />

    <x-alert 
        type="success"
        message="Success test"
    />

    <x-alert 
        type="warning"
        message="Warning test"
    />

    @svg('facebook', 'facebookIcon')

    <test-component></test-component>

    <slider-provider></slider-provider>
</x-layouts::app>