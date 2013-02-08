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
OpenLayers.Control.ElogysRemoveFeature = OpenLayers.Class(OpenLayers.Control.SelectFeature, {

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
        OpenLayers.Control.SelectFeature.prototype.initialize.apply(this, [layer, options]);
        
        this.onBeforeSelect=this.onFeatureDelete;
        
        var callbacks = {
            over: this.onMouseHover,
            out:  this.onMouseOut
        };
        this.callbacks = OpenLayers.Util.extend(callbacks, this.callbacks);
        
        this.handlers = {
            feature: new OpenLayers.Handler.Feature(
                this, this.layer, this.callbacks,
                {geometryTypes: this.geometryTypes}
            )
        };
    },

    /**
     * APIMethod: destroy
     * Take care of things that are not handled in superclass.
     */
    destroy: function() {
        OpenLayers.Control.SelectFeature.prototype.destroy.apply(this, []);
    },

    onFeatureDelete: function (feature) {
        if (feature) {
            var layer = feature.layer;
        
            if (layer) {
                layer.destroyFeatures(feature);
            }
        }
        return false;
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

    CLASS_NAME: "OpenLayers.Control.RemoveFeature"
});
