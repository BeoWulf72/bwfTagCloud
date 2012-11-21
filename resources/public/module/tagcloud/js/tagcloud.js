function  tagCloud(mytags){
		mytags=mytags.replace(/<A/g, '<a')
			.replace(/\/A>/g, "/a>")
			.replace(/(target=_)(\w*)/g, 'target="_$2"')
            .replace(/(class=)(?!")(\w*)/g, 'class="$2"')
            .replace(/(name=)(?!")(\w*)/g, 'name="$2"')
            .replace(/(id=)(?!")(\w*)/g, 'id="$2"');
        mytags=encodeURIComponent(mytags).replace(/!/g, '%21')
            .replace(/'/g, '%27').replace(/\(/g, '%28')
            .replace(/\)/g, '%29').replace(/\*/g, '%2A');
        var rnumber = Math.floor(Math.random()*9999999);
        var flashvars = {
            //tcolor:"0x2A62C8",
            tcolor:"0xCCCCCC", //0xEEECEC 0xE7E6E6
            trans: "true",
            //tcolor2:"0x000000",
            tcolor2:"0xFFFFFF",
            //hicolor:"0xB12AC8",
            hicolor:"0xFFFFFF",
            tspeed:"110",
            distr:"true",
            mode:"tags",
            tagcloud:mytags
            };
        var params = {
            allowScriptAccess:"always",
            bgcolor:'#000000'
            ,wmode:"opaque"
            //,value:'transparent'//,
            //wmode:'transparent'
            };
        var attributes = {
            id:"flash_cloud"
            };

        swfobject.embedSWF( tagcloudBase + "swf/tagcloud.swf?r="+rnumber,
            "tags", "160", "120", "9.0.0",
            tagcloudBase + "swf/expressInstall.swf",
            flashvars, params, attributes
            );
	}

jQuery().ready(function(){
	var mytags="<tags>"
		+jQuery('#tags').html()
		+"</tags>";

	tagCloud(mytags);
});


