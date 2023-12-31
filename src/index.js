import {TextControl} from '@wordpress/components';

wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are you paying attention?",
  icon: "smiley",
  category: "common",
  attributes: {
    skyColor: {type: "string"},
    grassColor: {type: "string"},
  },
  edit: EditComponent,
  save: function(props) {
    return null
  },
 
})

function EditComponent(props) {
    function updateSkyColor (e) {
      props.setAttributes({skyColor: e.target.value})
    }

    function updateGrassColor (e) {
      props.setAttributes({grassColor: e.target.value})
    }
    return ( 
      <>
        <div>
          {/* <input type="text" placeholder="sky color" value={props.attributes.skyColor} onChange={updateSkyColor} />
          <input type="text" placeholder="grass color" value={props.attributes.grassColor} onChange={updateGrassColor} /> */}
          <TextControl label="Question:"/>
        
        </div>
      </>
    );
  }