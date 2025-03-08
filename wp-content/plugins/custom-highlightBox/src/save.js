import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function Save({ attributes }) {
    const { heading, content, backgroundColor, hasBorder } = attributes;
    
    return (
        <div { ...useBlockProps.save({
            style: {
                backgroundColor,
                border: hasBorder ? '2px solid black' : 'none',
                padding: '10px',
            },
        })}>
            <RichText.Content tagName="h2" value={ heading } />
            <RichText.Content tagName="p" value={ content } />
        </div>
    );
}
