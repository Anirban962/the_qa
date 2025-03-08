import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls, PanelColorSettings } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { heading, content, backgroundColor, hasBorder } = attributes;
    
    return (
        <>
            <InspectorControls>
                <PanelBody title={ __('Settings', 'custom-highlight-box') }>
                    <PanelColorSettings
                        title={ __('Background Color', 'custom-highlight-box') }
                        colorSettings={[{
                            value: backgroundColor,
                            onChange: (color) => setAttributes({ backgroundColor: color }),
                            label: __('Background Color', 'custom-highlight-box'),
                        }]}
                    />
                    <ToggleControl
                        label={ __('Enable Border', 'custom-highlight-box') }
                        checked={ hasBorder }
                        onChange={(value) => setAttributes({ hasBorder: value })}
                    />
                </PanelBody>
            </InspectorControls>
            <div { ...useBlockProps({
                style: {
                    backgroundColor,
                    border: hasBorder ? '2px solid black' : 'none',
                    padding: '10px',
                },
            })}>
                <RichText
                    tagName="h2"
                    value={ heading }
                    onChange={(value) => setAttributes({ heading: value })}
                    placeholder={ __('Add Heading...', 'custom-highlight-box') }
                />
                <RichText
                    tagName="p"
                    value={ content }
                    onChange={(value) => setAttributes({ content: value })}
                    placeholder={ __('Add content...', 'custom-highlight-box') }
                />
            </div>
        </>
    );
}