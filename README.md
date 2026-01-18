# php-plain-25

A small PHP tool that computes text statistics for plain.

## Objective
- Provide quick text metrics for plain documents.
- Report top word frequencies for fast inspection.

## Use cases
- Validate plain drafts for repeated terms before review.
- Summarize plain notes when preparing reports.

## Usage
php index.php data/sample.txt --top 5

## Output
- lines: total line count
- words: total word count
- chars: total character count
- top words: most frequent tokens (case-insensitive)

## Testing
- run `bash scripts/verify.sh`

## Notes
- Only ASCII letters and digits are treated as word characters.
