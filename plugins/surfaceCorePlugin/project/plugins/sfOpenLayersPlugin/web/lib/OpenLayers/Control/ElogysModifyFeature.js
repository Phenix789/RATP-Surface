/* Copyright (c) 2006 MetaCarta, Inc., published under the Clear BSD license.
 * See http://svn.openlayers.org/trunk/openlayers/license.txt 
 * for the full text of the license. */


/**
 * @requires OpenLayers/Control/DragFeature.js
 * @requires OpenLayers/Control/SelectFeature.js
 * @requires OpenLayers/Handler/Keyboard.js
 */

/**
 * Class: OpenLayers.Control.ModifyFeature
 * Control to modify features.  When activated, a click renders the vertices
 *     of a feature - these vertices can then be dragged.  By default, the
 *     delete key will delete the vertex under the mouse.  New features are
 *     added by dragging "virtual vertices" between vertices.  Create a new
 *     control with the <OpenLayers.Control.ModifyFeature> constructor.
 *
 * Inherits From:
 *  - <OpenLayers.Control>
 */
OpenLayers.Control.ElogysModifyFeature = OpenLayers.Class(OpenLayers.Control.ModifyFeature, {

    /**
     * Constructor: OpenLayers.Control.ModifyFeature
     * Create a new modify feature control.
     *
     * Parameters:
     * layer - {<OpenLayers.Layer.Vector>} Layer that contains features that
     *     will be modified.
     * options - {Object} Optional object whose properties will be set on the
     *     control.
     */
    initialize: function(layer, options) {
        OpenLayers.Control.ModifyFeature.prototype.initialize.apply(this, [layer, options]);
        
        this.onSelect=this.onFeatureDelete;
        
        var callbacks = {
            over: this.onMouseHover,
            out:  this.onMouseOut
        };
        this.selectControl.callbacks = OpenLayers.Util.extend(callbacks, this.selectControl.callbacks);
        
        this.selectControl.handlers = {
            feature: new OpenLayers.Handler.Feature(
                this.selectControl, this.layer, this.selectControl.callbacks,
                {geometryTypes: this.selectControl.geometryTypes}
            )
        };
        
    },

    /**
     * APIMethod: destroy
     * Take care of things that are not handled in superclass.
     */
    destroy: function() {
        OpenLayers.Control.ModifyFeature.prototype.destroy.apply(this, []);
    },

    onMouseHover: function (feature) {
        var layer = feature.layer;
        
        this.highlight(feature);
    },
    
    onMouseOut: function (feature) {
        var layer = feature.layer;
        var selected = (OpenLayers.Util.indexOf(
            feature.layer.selectedFeatures, feature) > -1);
        if(!selected) {        
            this.unhighlight(feature);
        }
    },

    CLASS_NAME: "OpenLayers.Control.ElogysModifyFeature"
});
