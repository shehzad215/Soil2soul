(function(a){if(typeof define==="function"&&define.amd){define(["jquery"],a)}else{a(jQuery)}}(function(c){var a=0;c.fn.mosaicflow=function(g){var f=Array.prototype.slice.call(arguments,0);return this.each(function(){var i=c(this);var h=i.data("mosaicflow");if(!h){g=c.extend({},c.fn.mosaicflow.defaults,g,d(i));h=new b(i,g);i.data("mosaicflow",h)}else{if(typeof g==="string"){h[g](f[1])}}})};c.fn.mosaicflow.defaults={itemSelector:"> *",columnClass:"mosaicflow__column",minItemWidth:170,itemHeightCalculation:"auto",threshold:40};function b(f,g){this.container=f;this.options=g;this.container.trigger("start");this.init();this.container.trigger("ready")}b.prototype={init:function(){this.__uid=a++;this.__uidItemCounter=0;this.items=this.container.find(this.options.itemSelector);this.columns=c([]);this.columnsHeights=[];this.itemsHeights={};this.tempContainer=c("<div>").css({visibility:"hidden",width:"100%"});this.workOnTemp=false;this.autoCalculation=this.options.itemHeightCalculation==="auto";this.container.append(this.tempContainer);var f=this;this.items.each(function(){var h=c(this);var g=h.attr("id");if(!g){g=f.generateUniqueId();h.attr("id",g)}});this.container.css("visibility","hidden");if(this.autoCalculation){c(window).load(c.proxy(this.refill,this))}else{this.refill()}c(window).resize(c.proxy(this.refill,this))},refill:function(){this.container.trigger("fill");this.numberOfColumns=Math.floor(this.container.width()/this.options.minItemWidth);if(this.numberOfColumns<1){this.numberOfColumns=1}var f=this.ensureColumns();if(f){this.fillColumns();this.columns.filter(":hidden").remove()}this.container.css("visibility","visible");this.container.trigger("filled")},ensureColumns:function(){var g=this.columns.length;var h=this.numberOfColumns;this.workingContainer=g===0?this.tempContainer:this.container;if(h>g){var k=h-g;for(var j=0;j<k;j++){var i=c("<div>",{"class":this.options.columnClass});this.workingContainer.append(i)}}else{if(h<g){var f=g;while(h<=f){this.columns.eq(f).hide();f--}var l=g-h;this.columnsHeights.splice(this.columnsHeights.length-l,l)}}if(h!==g){this.columns=this.workingContainer.find("."+this.options.columnClass);this.columns.css("width",(100/h)+"%");return true}return false},fillColumns:function(){var l=this.numberOfColumns;var g=this.items.length;for(var k=0;k<l;k++){var h=this.columns.eq(k);this.columnsHeights[k]=0;for(var j=k;j<g;j+=l){var i=this.items.eq(j);var f=0;h.append(i);if(this.autoCalculation){f=i.outerHeight()}else{f=parseInt(i.find("img").attr("height"),10)}this.itemsHeights[i.attr("id")]=f;this.columnsHeights[k]+=f}}this.levelBottomEdge(this.itemsHeights,this.columnsHeights);if(this.workingContainer===this.tempContainer){this.container.append(this.tempContainer.children())}this.container.trigger("mosaicflow-layout")},levelBottomEdge:function(m,j){while(true){var k=c.inArray(Math.min.apply(null,j),j);var g=c.inArray(Math.max.apply(null,j),j);if(k===g){return}var i=this.columns.eq(g).children().last();var f=m[i.attr("id")];var h=j[k];var l=j[g];var n=h+f;if(n>=l){return}if(l-n<this.options.threshold){return}this.columns.eq(k).append(i);j[g]-=f;j[k]+=f}},add:function(j){this.container.trigger("add");var h=c.inArray(Math.min.apply(null,this.columnsHeights),this.columnsHeights);var f=0;if(this.autoCalculation){j.css({position:"static",visibility:"hidden",display:"block"}).appendTo(this.columns.eq(h));f=j.outerHeight();var g=j.find("img");if(g.length!==0){g.each(function(){var l=c(this);var k=e(l);var m=(l.width()*k.height)/k.width;f+=m})}j.detach().css({position:"static",visibility:"visible"})}else{f=parseInt(j.find("img").attr("height"),10)}if(!j.attr("id")){j.attr("id",this.generateUniqueId())}var i=this.items.toArray();i.push(j);this.items=c(i);this.itemsHeights[j.attr("id")]=f;this.columnsHeights[h]+=f;this.columns.eq(h).append(j);this.levelBottomEdge(this.itemsHeights,this.columnsHeights);this.container.trigger("mosaicflow-layout");this.container.trigger("added")},remove:function(g){this.container.trigger("remove");var f=g.parents("."+this.options.columnClass);this.columnsHeights[f.index()-1]-=this.itemsHeights[g.attr("id")];g.detach();this.items=this.items.not(g);this.levelBottomEdge(this.itemsHeights,this.columnsHeights);this.container.trigger("mosaicflow-layout");this.container.trigger("removed")},empty:function(){var h=this.numberOfColumns;this.items=c([]);this.itemsHeights={};for(var g=0;g<h;g++){var f=this.columns.eq(g);this.columnsHeights[g]=0;f.empty()}this.container.trigger("mosaicflow-layout")},recomputeHeights:function(){function f(l,m){m=c(m);var k=0;if(i.autoCalculation){k=m.outerHeight()}else{k=parseInt(m.find("img").attr("height"),10)}i.itemsHeights[m.attr("id")]=k;i.columnsHeights[h]+=k}var i=this;var j=this.numberOfColumns;for(var h=0;h<j;h++){var g=this.columns.eq(h);this.columnsHeights[h]=0;g.children().each(f)}},generateUniqueId:function(){this.__uidItemCounter++;return"mosaic-"+this.__uid+"-itemid-"+this.__uidItemCounter}};function d(i){function h(k,n){return n.toUpper()}var f={};var j=i.data();for(var g in j){f[g.replace(/-(\w)/g,h)]=j[g]}return f}function e(h){var g={};g.height=parseInt(h.attr("height"),10);g.width=parseInt(h.attr("width"),10);if(g.height===0||g.width===0){var f=new Image();f.src=h.attr("src");g.width=f.width;g.height=f.height}return g}c(function(){c(".mosaicflow").mosaicflow()})}));